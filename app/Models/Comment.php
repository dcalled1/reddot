<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    //Attributes id, author, likes, dislikes, father, post, comments, content, level, history, created_at, updated_at
    protected $fillable = [
        'author',
        'likes',
        'dislikes',
        'father',
        'post',
        'comments',
        'content',
        'level',
        'post_id'
    ];

    //Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getDislikes()
    {
        return $this->dislikes;
    }

    public function setDislikes($dislikes)
    {
        $this->dislikes = $dislikes;
    }

    public function getFather()
    {
        return $this->father;
    }

    public function setFather($father)
    {
        $this->father = $father;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    //Relationship with Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //Relationships with User

    //Author
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    //Likes
    public function likes()
    {
        return $this->belongsToMany(User::class, 'user_dislike_comment');
    }

    //Dislikes
    public function dislikes()
    {
        return $this->belongsToMany(User::class, 'user_dislike_comment');
    }

    //Father
    public function father()
    {
        return $this->belongsTo(Comment::class);
    }

    //Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
