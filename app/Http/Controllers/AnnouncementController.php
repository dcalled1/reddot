<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Validator;

class AnnouncementController extends Controller
{
    //Create function
    public function create()
    {
        $data = []; 
        $data["title"] = "Create Announcement";

        return view('announcement.create')->with("data",$data);
    }

    //Save Function
    public function save(Request $request)
    {
        Announcement::validate($request);
        Announcement::create($request->only(['author','community','content','tags','topics','erase']));
        $data = [];
        $data["success"] = 'Announcement created correctly!';
        return back()->with('data', $data);
    }

    //Update function
    public function update()
    {
        $data = []; 
        $data["title"] = "Update Announcement";

        return view('announcement.update')->with("data",$data);
    }

    //Save Update Function
    public function saveUpdate(Request $request)
    {
        $announcement_id = $request['id'];
        $content = $request['content'];
        $tags = $request['tags'];
        $topics = $request['topics'];
        $erase = $request['erase'];
        Announcement::validate($request);
        Announcement::where('id', $announcement_id)->update(['content' => $content, 'tags' => $tags, 'topics' => $topics, 'erase' => $erase]);
        $data = [];
        $data["success"] = 'Announcement updated correctly!';
        return back()->with('data', $data);
    }

    //List announcement
    public function show()
    {
        $data = [];
        $data["title"] = "Announcements Dashboard";
        $data["announcement"] = Announcement::all();
        return view('announcement.show')->with("data",$data);
    }

    //List specific id
    public function showid($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('announcement.showid')->with("announcement",$announcement);
    }

    //Delete announcement
    public function delete(Request $request)
    {;
        $id = $request->only("id");
        $res=Announcement::where('id',$id)->delete();
        $data = [];
        $data["title"] = "Announcement Dashboard";
        $data["success"] = 'Announcement deleted correctly!';
        $data["announcement"] = Announcement::all();
        return redirect('announcement/show')->with('data', $data);
    }

    //Likes
    public function announcementLikeAnnouncement(Request $request)
    {
        $announcement_id = $request['announcement_id'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $announcement = Announcement::find($announcement_id);
        if (!$announcement) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('announcement_id', $announcement_id)->first();
        //$dislike = $user->dislikes()->where('announcement_id', $announcement_id)->first();
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
        $like->announcement_id = $announcement->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    //Dislikes
    public function announcementDislikeAnnouncement(Request $request)
    {
        $announcement_id = $request['announcement_id'];
        $is_dislike = $request['isDislike'] === 'true';
        $update = false;
        $announcement = Announcement::find($announcement_id);
        if (!$announcement) {
            return null;
        }
        $user = Auth::user();
        //$like = $user->likes()->where('announcement_id', $announcement_id)->first();
        $dislike = $user->dislikes()->where('announcement_id', $announcement_id)->first();
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
        $dislike->announcement_id = $announcement->id;
        if ($update) {
            $dislike->update();
        } else {
            $dislike->save();
        }
        return null;
    }
}
