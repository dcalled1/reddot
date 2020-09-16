<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Post extends Model
{
    use HasFactory;

    /*
    atributos:
    id(auto-incrementable)
    author
    title
    likes
    dislikes
    community
    comments
    content
    tags
    topics
    interactions
    created
    */ 
    protected $fillable = ['title', 'author_id', 'community_id', 'content', 'tags', 'topics'];

    protected $attributes = ['interactions' => 0];

    //Metodos

    public static function validate(Request $request) {
        $request->validate([
            //validators
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    /*public function getLikes(){
        $this->attributes['likes'];
    }

    public function getDislikes(){
        $this->attributes['dislikes'];
    }*/

    public function getCommunity() {
        $this->attributes['community_id'];
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    /*public function likes(){
        return $this->belongsToMany(User::class, 'user_likes_post');
    }

    public function dislikes(){
        return $this->belongsToMany(User::class, 'user_dislikes_post');
    }*/
    
    public function community() {
        return $this->belongsTo(Community::class, 'community_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getContent() {
        return $this->attributes['content'];
    }

    public function setContent($content) {
        $this->attributes['content'] = $content;
    }

    public function getTags() {
        return $this->attributes['tags'];
    }

    public function setTags($tags) {
        $this->attributes['tags'] = $tags;
    }

    public function getTopics() {
        return $this->attributes['topics'];
    }

    public function setTopics($topics) {
        $this->attributes['topics'] = $topics;
    }

    public function getTitle() {
        return $this->attributes['title'];
    }

    public function setTitle($title) {
        $this->attributes['title'] = $title;
    }

    public function getInteractions() {
        return $this->attributes['interactions'];
    }

    public function setInteractions($likes, $dislikes) {
        $this->attributes['interactions'] = $likes + $dislikes;
    }

    public function getCreated() {
        return $this->attributes['created'];
    }
}
