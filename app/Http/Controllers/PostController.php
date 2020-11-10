<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use Validator;

class PostController extends Controller
{
    //Create function
    public function create($community)
    {
        $data = []; 
        $data["title"] = "Create Post";
        $data["community"] = Community::findorFail($community);
        return view('post.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        Post::validate($request);
        Post::create($request->only(['title', 'author_id', 'community_id','content','tags','topics']));
        $data = [];
        $data["success"] = 'Post created correctly!';
        return back()->with('data', $data);
    }

    //Update function
    public function update($community, $post)
    {
        $data = []; 
        $data["title"] = "Update Post";
        $data['post'] = Post::findOrFail($post);
        $data['community'] = Community::findOrFail($community);
        return view('post.update')->with("data",$data);
    }

    //Save Update Function
    public function saveUpdate(Request $request)
    {
        
        $post_id = $request['id'];
        $content = $request['content'];
        $tags = $request['tags'];
        $topics = $request['topics'];
        $title = $request['title'];
        Post::validate($request);
        Post::findOrFail($post_id)->update(['content' => $content, 'tags' => $tags, 'topics' => $topics, 'title' => $title]);
        $data = [];
        $data["success"] = 'Post updated correctly!';
        return back()->with('data', $data);
    }

    //List post
    public function index($community)
    {
        $data = [];
        $data["title"] = "Posts Dashboard";
        $data["post"] = Post::all()->where('community_id', $community);
        $data["community"] = Community::findOrFail($community);
         return view('post.index')->with("data",$data);
    }

    //List specific id
    public function show($community, $post)
    {
        $postob = Post::findOrFail($post);
        return view('post.show')->with("post",$postob);
    }

    //Delete post
    public function delete(Request $request)
    {;  
        $id = $request["id"];
        $community = Post::findOrFail($id)->getCommunity();
        $res=Post::where('id',$id)->delete();
        $data = [];
        $data["title"] = "Post Dashboard";
        $data["success"] = 'Post deleted correctly!';
        $data["post"] = Post::all();
        return redirect()->route('post.index', $community)->with('data', $data);
    }

    // Likes
    public function postLikePost(Request $request)
    {
        $post_id = $request['post_id'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likedPosts()->where('post_id', $post_id)->first();
        //$dislike = $user->dislikes()->where('post_id', $post_id)->first();
        if ($like /*&& !$dislike*/) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }

        /* elseif (!$like && $dislike){
            $dislike->delete();
            $like = new Like();
        }

        */
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    //Dislikes
    public function postDislikePost(Request $request)
    {
        $post_id = $request['post_id'];
        $is_dislike = $request['isDislike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        //$like = $user->likes()->where('post_id', $post_id)->first();
        $dislike = $user->dislikedPosts()->where('post_id', $post_id)->first();
        if (/*!$like &&*/ $dislike) {
            $already_dislike = $dislike->dislike;
            $update = true;
            if ($already_dislike == $is_dislike) {
                $dislike->delete();
                return null;
            }
        } else {
            $dislike = new Dislike();
        }

        /* elseif (!$dislike && $like){
            $like->delete();
            $dislike = new Dislike();
        }

        */
        $dislike->dislike = $is_dislike;
        $dislike->user_id = $user->id;
        $dislike->post_id = $post->id;
        if ($update) {
            $dislike->update();
        } else {
            $dislike->save();
        }
        return null;
    }
    
}
