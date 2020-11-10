<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommunityResource extends JsonResource {

    public function toArray($request) {
        return [
            'community_name' => $this->getName(),
            'admin_name' => $this->admin->getName(),
            'admin_email' => $this->admin->getEmail(),
            'number_of_members' => $this->countMembers(),
            'number_of_posts' => $this->countPosts(),
        ];
    }
}