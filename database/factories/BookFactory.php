<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $collections = Collection::all()->pluck('id');
        return [
            'title' => fake()->name(),
            'subject' => fake()->name(),
            'authors' => fake()->name(),
            'edition' => fake()->randomNumber(4),
            'publish_year' => fake()->year(),
            'publisher' => fake()->name(),
            'collection_id' => rand(1, $collections->count()),
        ];
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return BookFactory::new();
    }
}
