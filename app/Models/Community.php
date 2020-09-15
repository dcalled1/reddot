<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model {
    use HasFactory;








    public function members() {
        return $this->belongsToMany('App\Models\User', 'user_member_community');
    }

    public function admins() {
        return $this->belongsToMany('App\Models\User', 'user_admin_community');
    }

    public function mods() {
        return $this->belongsToMany('App\Models\User', 'user_mod_community');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post', 'community_id');
    }

    public function announcements() {
        return $this->hasMany('App\Models\Announcement', 'community_id');
    }
}
