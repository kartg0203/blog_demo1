<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 6),
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->text(rand(220, 730)),
        ];
    }
}
