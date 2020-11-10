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
        $data["title"] = __("Create Comment");
        $data["community"] = $community;
        $data["post"] = $post;
        $post2 = Post::findOrFail($post);
        $data["post_name"] = $post2->title;
        $community = $post2->community()->get();
        $data["community_name"] = $community[0]->name;
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
        $data["title"] = __("Posts Dashboard");
        $data["post"] = Post::all()->where('community_id', $community_id);
        $data["success"] = __('Comment created correctly!');
        return redirect()->route('post.index', $community_id)->with('data', $data);
    }

    //Update function
    public function update($community, $post, $comment)
    {
        $data = []; 
        $data["title"] = __("Update Comment");
        $data["post"] = $post;
        $data["community"] = $community;
        $comment2 = Comment::findOrFail($comment);
        $data['comment'] = $comment2;
        $post2 = $comment2->post()->get();
        $data["post_name"] = $post2[0]->title;
        $community = $post2[0]->community()->get();
        $data["community_name"] = $community[0]->name;

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
        $data["success"] = __('Comment updated correctly!');
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
