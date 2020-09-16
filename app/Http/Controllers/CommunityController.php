<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Post;

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
        $ = $request[''];
        $ = $request[''];
        $ = $request[''];
        $ = $request[''];
        $ = $request[''];
    }


    //List
    public function index()
    {

    }


    //Show
    public function show($id)
    {

    }


    //Delete
    public function delete(Request $request)
    {

    }

    
    //Join community
    public function join(Request $request)
    {

    }

}
