<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence();
         return [
            'title'         => fake()->sentence,
            //'slug'          => Str::slug($title),
            'description'   => fake()->paragraphs(3, true),
            'created_at'  => fake()->dateTimeBetween('-1 year', 'now'),
            'user_id'       => random_int(1, 30)
        ];
    }
}
