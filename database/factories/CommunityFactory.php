<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(100),
            'preferredTags' => implode(',', $this->faker->words($this->faker->randomDigitNot(0))),
            'topics' => implode(',', $this->faker->words($this->faker->randomDigitNot(0))),
            'admin_id' => $this->faker->randomElement(User::all()),
        ];
    }
}
