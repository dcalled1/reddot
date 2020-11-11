<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

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
            'expire' => $this->faker->dateTimeBetween('now', '+10 years'),
            'author_id' => $this->faker->randomElement(User::all()),
            'community_id' => $this->faker->randomElement(Community::all()),            
        ];
    }
}
