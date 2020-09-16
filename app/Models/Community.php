<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model {
    use HasFactory;






    public function members() {
        return $this->belongsToMany(User::class, 'user_member_community');
    }

    public function countMembers() {
        return count($this->members);
    }

    public function addMember(User $user) {
        if(!$this->isMember($user)) {
            $this->members()->attach($user->getId());
        }
    }

    public function isMember(User $user) {
        return in_array($user, $this->members);
    }

    /*public function admins() {
        return $this->belongsToMany(User::class, 'user_admin_community');
    }

    public function mods() {
        return $this->belongsToMany(User::class, 'user_mod_community');
    }*/

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'community_id');
    }

    public function announcements() {
        return $this->hasMany(Announcement::class, 'community_id');
    }
}
