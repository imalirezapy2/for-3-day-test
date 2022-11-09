<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Plan::all() as $plan) {
            $seats = range(1, $plan->capacity);
            for ($j = 0; $j < fake()->numberBetween(1, 10); ++$j) {

                if (count($seats) <= 1) {
                    break;
                }

                $count = fake()->numberBetween(1, count($seats)/2+1);
                $seats_num = Arr::random($seats, $count);
                $seats = array_diff($seats, $seats_num);

                Book::create([
                    'plan_id' => $plan->id,
                    'count' => $count,
                    'seats_num' => json_encode($seats_num),
                    'created_at' => now()
                ]);
            }
        }
    }
}
