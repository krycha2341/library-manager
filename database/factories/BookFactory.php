<?php

namespace Database\Factories;

use App\Enums\BookStatus;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
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
        return [
            'id' => null,
            'title' => ucfirst(fake()->word),
            'author' => fake()->name,
            'publication_date' => fake()->year,
            'print' => ucfirst(fake()->word),
            'status' => BookStatus::READY,
            'customer_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
