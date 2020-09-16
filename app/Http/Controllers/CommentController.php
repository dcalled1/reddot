<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Validator;

class CommentController extends Controller
{
    //Create function
    public function create($community, $post)
    {
        $data = []; 
        $data["title"] = "Create Comment";
        $data["community"] = $community;
        $data["post"] = $post;
        return view('comment.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        $post = $request['post_id'];
        $community_id = $request['community_id'];
        Comment::create($request->only(['content', 'author_id', 'post_id']));
        $data = [];
        $data["community"] = $community_id;
        $data["title"] = "Posts Dashboard";
        $data["post"] = Post::all()->where('community_id', $community_id);
        $data["success"] = 'Comment created correctly!';
        return redirect()->route('post.index', $community_id)->with('data', $data);
    }

    //Update function
    public function update($community, $post, $comment)
    {
        $data = []; 
        $data["title"] = "Update Comment";
        $data["post"] = $post;
        $data["community"] = $community;
        $data['comment'] = Comment::findOrFail($comment);

        return view('comment.update')->with("data",$data);
    }

    //Save Update Function
    public function saveUpdate(Request $request)
    {   
        $comment_id = $request['id'];
        $content = $request['content'];
        $post_id = $request['post_id'];
        $community_id = $request['community_id'];
        Comment::findOrFail($comment_id)->update(['content' => $content]);
        $data["success"] = 'Comment updated correctly!';
        return redirect()->route('post.show', [$community_id, $post_id])->with('data', $data);
    }

    //Delete Comment
    public function delete(Request $request)
    {;  
        $id = $request["id"];
        $community_id = $request["community_id"];
        $post_id = $request["post_id"];
        $res=Comment::where('id',$id)->delete();
        $data = [];
        return redirect()->route('post.show', [$community_id, $post_id])->with('data', $data);
    }

}
