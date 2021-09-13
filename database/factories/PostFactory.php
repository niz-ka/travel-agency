<?php

namespace Database\Factories;

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
            "title" => $this->faker->realText(70),
            "slug" => $this->faker->slug(),
            "content" => $this->faker->realText(5000),
            "image" => $this->faker->imageUrl(),
            "user_id" => User::factory(),
        ];
    }
}
