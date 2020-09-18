<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Announcement extends Model
{
    use HasFactory;

    /*
    atributos:
    id(auto-incrementable)
    author
    likes
    dislikes
    community
    expire
    content
    tags
    topics
    created
    */ 
    protected $fillable = ['title', 'author_id', 'community_id','content','tags','topics', 'expire'];

    
    //Metodos

    public static function validate(Request $request){
        $request->validate([
            "title" => "required",
            "content" => "required",
            "tags" => "required",
            "topics"  => "required",
            "expire" => "required"
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
    /*
    public function getLikes(){
        $this->attributes['likes'];
    }

    public function getDislikes(){
        $this->attributes['dislikes'];
    }
    */
    public function getAuthor(){
        return $this->attributes['author_id'];
    }

    public function getCommunity(){
        return $this->attributes['community_id'];
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    /*
    public function likes(){
        return $this->belongsToManny(User::class, 'user_likes_announcement');
    }
    
    public function dislikes(){
        return $this->belongsToManny(User::class, 'user_dislikes_announcement');
    }
    */
    public function community(){
        return $this->belongsTo(Community::class);
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

    public function getTopics(){
        return $this->attributes['topics'];
    }

    public function setTopics($topics)
    {
        $this->attributes['topics'] = $topics;
    }

    public function getTitle(){
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getExpire(){
        return $this->attributes['expire'];
    }

    public function setExpire($expire){
        $this->attributes['expire'] = $expire;
    }
}
