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
        $data["title"] = __("Create Post");
        $data["community"] = Community::findorFail($community);
        return view('post.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        Post::validate($request);
        Post::create($request->only(['title', 'author_id', 'community_id','content','tags','topics']));
        $data = [];
        $data["success"] = __('Post created correctly!');
        return back()->with('data', $data);
    }

    //Update function
    public function update($community, $post)
    {
        $data = []; 
        $data["title"] = __("Update Post");
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
        $data["success"] = __('Post updated correctly!');
        return back()->with('data', $data);
    }

    //List post
    public function index($community)
    {
        $data = [];
        $data["title"] = __("Posts Dashboard");
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
        $data["title"] = __("Posts Dashboard");
        $data["success"] = __('Post deleted correctly!');
        $data["post"] = Post::all();
        return redirect()->route('post.index', $community)->with('data', $data);
    }
    
    public function tweet(Request $request)
    {
        return Twitter::postTweet(['status' =>'Mi primer tweet desde Laravel','format' =>'json']);
    }
}
