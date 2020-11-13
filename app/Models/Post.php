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

    //Metodos

    public static function validate(Request $request) {
        $request->validate([
            "title" => "required|max:20",
            "content" => "required",
            "tags" => "required|max:20",
            "topics"  => "required|max:20"
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

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getAuthor(){
        return $this->author->getName();
    }

    public function getCommunity(){
        return $this->community->getId();
    }

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

    public function getCreated() {
        return $this->attributes['created'];
    }

}
