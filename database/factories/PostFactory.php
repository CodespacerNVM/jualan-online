<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(10, true);
        return [
            'user_id' => 1,
            'title' => str($title)->title(),
            'slug' => str($title)->slug(),
            'body' => $this->faker->paragraphs(mt_rand(50, 200), true),
            'tags' => '["asd", "asd"]'
        ];
    }
}
