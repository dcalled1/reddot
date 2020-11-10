<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    //Attributes id, author, likes, dislikes, father, post, comments, content, level, history, created_at, updated_at
    protected $fillable = [
        'author_id',
        //'likes',
        //'dislikes',
        //'father',
        //'post',
        //'comments',
        'content',
        //'level',
        'post_id'
    ];

    public static function validate(Request $request) {
        $request->validate([
            "content" => "required",
        ]);
    }

    //Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author_id;
    }

    public function setAuthor($author_id)
    {
        $this->author_id = $author_id;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
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
        return $this->belongsTo(User::class, 'author_id');
    }

}
