<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    /*
    atributos:
    id(auto-incrementable)
    author
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
    protected $fillable = ['author','community','content','tags','topics','interactions'];


    //Metodos

    public static function validate(Request $request){
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

    public function author(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToManny(User::class);
    }

    public function dislikes(){
        return $this->belongsToManny(User::class);
    }
    
    public function community(){
        return $this->belongsTo(Community::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getContent(){
        return $this->attributes['content'];
    }

    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }

    public function getTags(){
        return $this->attributes['tags'];
    }

    public function setTags($tags)
    {
        $this->attributes['tags'] = $tags;
    }

    public function getTitle(){
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getInteractions(){
        return $this->attributes['interactions'];
    }

    public function setInteractions($likes, $dislikes)
    {
        $this->attributes['interactions'] = $likes + $dislikes;
    }

    public function getCreated(){
        return $this->attributes['created'];
    }
}
