<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Community;
use Validator;

class AnnouncementController extends Controller
{
    //Create function
    public function create($community)
    {
        $data = []; 
        $data["title"] = __("Create Announcement");
        $data["community"] = Community::findOrFail($community);
        return view('announcement.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        Announcement::validate($request);
        error_log($request['expire']);
        Announcement::create($request->only(['title', 'author_id','community_id', 'content', 'tags', 'topics', 'expire']));
        $data = [];
        $data["success"] = __('Announcement created correctly!');
        return back()->with('data', $data);
    }

    //Update function
    public function update($community, $id)
    {
        $data = []; 
        $data["title"] = __("Update Announcement");
        $data['announcement'] = Announcement::findOrFail($id);
        $data['community'] = Community::findOrFail($community);
        return view('announcement.update')->with("data",$data);
    }

    //Save Update Function
    public function saveUpdate(Request $request)
    {
        $announcement_id = $request['id'];
        $title = $request['title'];
        $content = $request['content'];
        $tags = $request['tags'];
        $topics = $request['topics'];
        $expire = $request['expire'];
        Announcement::validate($request);
        Announcement::findOrFail($announcement_id)->update(['title' => $title, 'title' => $title, 'title' => $title, 'content' => $content, 'tags' => $tags, 'topics' => $topics, 'expire' => $expire]);
        $data = [];
        $data["success"] = __('Announcement updated correctly!');
        return back()->with('data', $data);
    }

    //List announcement
    public function index($community)
    {
        $data = [];
        $data["title"] = __("Announcements Dashboard");
        $data["announcement"] = Announcement::all()->where('community_id', $community);
        $data["community"] = Community::findOrFail($community);
        return view('announcement.index')->with("data",$data);
    }

    //List specific id
    public function show($community, $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcement.show')->with("announcement",$announcement);
    }

    //Delete announcement
    public function delete(Request $request)
    {;
        $id = $request['id'];
        $community = Announcement::findOrFail($id)->getCommunity();
        $res=Announcement::where('id',$id)->delete();
        $data = [];
        $data["title"] = __("Announcements Dashboard");
        $data["success"] = __('Announcement deleted correctly!');
        $data["announcement"] = Announcement::all();
        return redirect()->route('announcement.index', $community)->with('data', $data);
    }

}
