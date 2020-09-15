<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use Validator;

class PostController extends Controller
{
    //Create function
    public function create()
    {
        $data = []; 
        $data["title"] = "Create Post";
        error_log('Some message here.');
        $data["community"] = Community::get('name');
        return view('post.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        error_log('Some message here.');
        $community = Community::findOrFail($request['community']);
        Post::validate($request);
        Post::create($request->only([$community,'content','tags','topics']));
        $data = [];
        $data["success"] = 'Post created correctly!';
        return back()->with('data', $data);
    }

    //Update function
    public function update()
    {
        $data = []; 
        $data["title"] = "Update Post";

        return view('post.update')->with("data",$data);
    }

    //Save Update Function
    public function saveUpdate(Request $request)
    {
        $post_id = $request['id'];
        $content = $request['content'];
        $tags = $request['tags'];
        $topics = $request['topics'];
        $erase = $request['erase'];
        Post::validate($request);
        Post::where('id', $post_id)->update(['content' => $content, 'tags' => $tags, 'topics' => $topics, 'erase' => $erase]);
        $data = [];
        $data["success"] = 'Post updated correctly!';
        return back()->with('data', $data);
    }

    //List post
    public function show()
    {
        $data = [];
        $data["title"] = "Posts Dashboard";
        $data["post"] = Post::all();
        return view('post.show')->with("data",$data);
    }

    //List specific id
    public function showid($id)
    {
        $post = Post::findOrFail($id);

        return view('post.showid')->with("post",$post);
    }

    //Delete post
    public function delete(Request $request)
    {;
        $id = $request->only("id");
        $res=Post::where('id',$id)->delete();
        $data = [];
        $data["title"] = "Post Dashboard";
        $data["success"] = 'Item deleted correctly!';
        $data["post"] = Post::all();
        return redirect('post/show')->with('data', $data);
    }

    //Likes
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
