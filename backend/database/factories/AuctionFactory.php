<?php

namespace Database\Factories;

use App\Enums\AuctionStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => fake()->name,
            'description' => fake()->text(500),
            'starting_bid' => fake()->randomFloat(2, 2, 100),
            'status' => fake()->randomElement(AuctionStatusEnum::values())
        ];
    }
}
