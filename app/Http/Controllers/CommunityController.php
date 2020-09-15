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


    //Update


    //Save update


    //List


    //Show


    //Delete

    
    //Add member

}
