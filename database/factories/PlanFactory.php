<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'start_city' => Str::random(5),
            'end_city' => Str::random(5),
            'start_terminal' => Str::random(5),
            'end_terminal' => Str::random(5),
            'move_day' => fake()->numberBetween(0, 7),
            'move_time' => now()->addHours(fake()->numberBetween(1, 23))->format('H:i:s'),
            'proccess_time' => fake()->numberBetween(9, 20). '0',
            'capacity' => $capacity = fake()->numberBetween(20, 40),
            'bus_type' => $capacity<=25?'mini':Arr::random(['vip', 'standard']),
            'price' => fake()->numberBetween(8, 15) . '00000',
            'search_code' => fake()->randomNumber(7),
            'created_at' => now()
        ];
    }
}
