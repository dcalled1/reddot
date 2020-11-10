<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityResource;
use App\Http\Resources\PostResource;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityApi extends Controller {
    
    
    public function info($id) {
        $community = Community::findOrFail($id);
        return new CommunityResource($community);
    }

    public function posts($id) {
        $community = Community::findOrFail($id);
        return PostResource::collection($community->posts);
    }

    public function announcements($id) {
        $community = Community::findOrFail($id);
        return PostResource::collection($community->announcements);
    }
}
