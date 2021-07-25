<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = $this->faker->dateTimeBetween('-5 years');
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'blog_id' => $this->faker->numberBetween(1, Blog::count()),
            'content' => $this->faker->text(rand(20, 100)),
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }
}
