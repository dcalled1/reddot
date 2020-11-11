<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    //Create
    public function create()
    {
        $data = [];
        $data['title'] = __("Create community");

        return view('community.create')->with('data', $data);
    }

    //Save
    public function save(Request $request)
    {
        Community::validate($request);
        Community::create($request->only(['name',
                                          'description',
                                          'topics',
                                          'preferredTags',
                                          'admin_id']));

        $data = [];
        $data['success'] = __('Community created successfully!');

        return back()->with('data', $data);
    }

    //Update
    public function update($id)
    {
        $data = [];
        $data['title'] = __('Update community');
        $data['community'] = Community::findOrFail($id);

        return view('community.update')->with('data', $data);
    }


    //Save update
    public function saveUpdate(Request $request)
    {
        $id = $request['id'];
        $name = $request['name'];
        $description = $request['description'];
        $topics = $request['topics'];
        $preferredTags = $request['preferredTags'];

        $data = [];
        $data['success'] = __("Community updated successfully!");

        Community::validate($request);
        Community::findOrFail($id)->update(['name' => $name, 'description' => $description, 'topics' => $topics, 'preferredTags' => $preferredTags]);

        return back()->with('data', $data);
    }


    //List
    public function index()
    {
        $data = [];
        $data['title'] = __('Communities');
        $data['communities'] = Community::paginate(8);

        return view('community.index')->with('data', $data);
    }


    //Show
    public function show($id)
    {
        $community = Community::findOrFail($id);

        return view('community.show')->with('community', $community);
    }


    //Delete
    public function delete(Request $request)
    {
        $id = $request["id"];
        $res=Community::findOrFail($id)->delete();
        
        $data = [];
        $data["title"] = __("Communities");
        $data["success"] = __('Community deleted successfully!');

        return redirect()->route('community.index');
    }

    
    //Join community
    public function join(Request $request)
    {
        $user = Auth::user();
        $id = $request['community_id'];

        $community = Community::findOrFail($id);
        
        $community->addMember($user);

        //error_log($community);

        return back()->with('community', $community);
    }

}
