<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
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
        $data = $this->faker->dateTimeBetween('-10 years');
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'category_id' => $this->faker->numberBetween(1, 6),
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->text(rand(220, 730)),
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }
}
