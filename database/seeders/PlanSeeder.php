<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [];
        for ($i = 0; $i < 20; ++$i) {
            $cities[] = Str::random(5);
        }

        foreach ($cities as $city) {
            for ($i = 0; $i < fake()->numberBetween(1, 3); ++$i) {
                Plan::create([
                    'start_city' => $city,
                    'end_city' => Arr::random($cities),
                    'start_terminal' => Str::random(5),
                    'end_terminal' => Str::random(5),
                    'move_day' => fake()->numberBetween(0, 7),
                    'move_time' => now()->addHours(fake()->numberBetween(1, 23))->format('H:i:s'),
                    'proccess_time' => fake()->numberBetween(9, 20) . '0',
                    'capacity' => $capacity = fake()->numberBetween(20, 40),
                    'bus_type' => $capacity <= 25 ? 'mini' : Arr::random(['vip', 'standard']),
                    'price' => fake()->numberBetween(8, 15) . '00000',
                    'created_at' => now()
                ]);
            }
        }
    }
}
