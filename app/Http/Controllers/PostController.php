<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use Validator;
use \Twitter;


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
        $post = Post::create($request->only(['title', 'author_id', 'community_id','content','tags','topics']));
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $post->getId());
        print_r($request->only('post_image'));
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
        $data["post"] = Post::where('community_id', $community)->paginate(8);
        $data["community"] = Community::findOrFail($community);
         return view('post.index')->with("data",$data);
    }

    //List specific id
    public function show($communityId, $postId)
    {
        $post = Post::findOrFail($postId);
        //check if post url is correct
        if($communityId != $post->community->getId()) 
            return redirect()->route('post.show', ['community' => $post->community->getId(), 'post' => $postId]);
        $postURL = route('post.show', ['community' => $communityId, 'post' => $postId]);

        //Twitter URL generation
        $title = $post->getTitle();
        $tweetText = sprintf('"%s". Found this post at ', $title);
        $tweetURL = 'http://twitter.com/intent/tweet?text='.urlencode($tweetText).'&url='.urlencode($postURL);
        $data["tweetURL"] = $tweetURL;

        //Image show
        error_log(Storage::disk('local')->exists('\public\Post'.$postId.'.png'));
        if(Storage::disk('local')->exists('\public\Post'.$postId.'.png')){
            $image = 'storage/Post'.$postId.'.png';
            $data['image'] = $image;
        }else{
            $data['image'] = null;
        }
        $data['post'] = $post;
        return view('post.show')->with("data",$data);
    }

    //Delete post
    public function delete(Request $request)
    {;  
        $id = $request["id"];
        $community = Post::findOrFail($id)->community;
        $res=Post::where('id',$id)->delete();
        $data = [];
        $data["title"] = __("Posts Dashboard");
        $data["success"] = __('Post deleted correctly!');
        $data["post"] = Post::all();
        return redirect()->route('post.index', $community->getId())->with('data', $data);
    }
    
    public function tweet(Request $request)
    {
        return Twitter::postTweet(['status' =>'Mi primer tweet desde Laravel','format' =>'json']);
    }
}
