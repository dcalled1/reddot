<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Community extends Model {
    use HasFactory;

    protected $fillable = ['name', 'description', 'topics', 'preferredTags', 'admin_id'];

    public static function validate(Request $request) {
        $request->validate([
            //Validators
        ]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->$name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->$description=$description;
    }

    public function getTopics()
    {
        return $this->topics;
    }

    public function setTopics($topics)
    {
        $this->$topics=$topics;
    }

    public function getPreferredTags()
    {
        return $this->preferredTags;
    }

    public function setPreferredTags($preferredTags)
    {
        $this->$preferredTags=$preferredTags;
    }

    public function getAdminId()
    {
        return $this->admin_id;
    }

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
        foreach($this->members as $member) {
            if($member->getId() == $user->getId()) {
                return true;
            }
        }
        return false;
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
