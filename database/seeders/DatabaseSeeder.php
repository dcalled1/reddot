<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Comment;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();
        Community::factory()->count(8)->create();
        $posts = Post::factory()->count(60)->create();
        $announcements = Announcement::factory()->count(30)->create();
        $comments = Comment::factory()->count(200)->create();
        foreach($posts as $post) {
            $post->community->addMember($post->author);
        }
        foreach($announcements as $announcement) {
            $announcement->community->addMember($announcement->author);
        }
        foreach($comments as $comment) {
            $comment->post->community->addMember($comment->author);
        }
    }
}
