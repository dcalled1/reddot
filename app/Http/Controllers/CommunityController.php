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

    }

    //Update
    public function update()
    {

    }


    //Save update
    public function saveUpdate(Request $request)
    {

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

    
    //Add member
    public function join(Request $request)
    {

    }

}
