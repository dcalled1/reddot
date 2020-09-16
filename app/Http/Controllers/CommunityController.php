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
        $data['title'] = "Create community";
        $data['community'] = $community;

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
        $data['success'] = 'Community created successfully!';

        return back()->with('data', $data);
    }

    //Update
    public function update()
    {
        $data = [];
        $data['title'] = 'Update community';

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
        $data['success'] = "Community updated successfully!";

        return back()->with('data', $data);
    }


    //List
    public function index()
    {
        $data = [];
        $data['title'] = 'Communities';
        $data['communities'] = Community::all();

        return view('community.index')->with('data', $data);
    }


    //Show
    public function show($id)
    {
        $community = Community::findOrFail($id);

        return view('community.show')->with('data', $data);
    }


    //Delete
    public function delete($id)
    {
        $community = Community::where('id', $id)->delete();

        if ($community == null)
        {
            return redirect()->route('community.index');
        }

        return redirect()->route('community.index');
    }

    
    //Join community
    public function join(Request $request)
    {
        $user = Auth::user();

        $data = [];
        $data['success'] = 'Community joined successfully!';
    }

}