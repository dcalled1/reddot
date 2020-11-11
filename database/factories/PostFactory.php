<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->country,
            'content' => $this->faker->text(),
            'tags' => implode(',', $this->faker->words($this->faker->randomDigitNot(0))),
            'topics' => implode(',', $this->faker->words($this->faker->randomDigitNot(0))),
            'author_id' => $this->faker->randomElement(User::all()),
            'community_id' => $this->faker->randomElement(Community::all()),   
        ];
    }
}
