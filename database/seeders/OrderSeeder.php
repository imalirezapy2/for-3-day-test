<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Book::all() as $book){
            if (Arr::random([true, false, false, false])) continue;

             foreach (json_decode($book->seats_num, true) as $seat_num){
                 $book->orders()->create([
                     'fname' => fake()->word(),
                     'lname' => fake()->word(),
                     'phone' => '9' . fake()->randomNumber(9),
                     'seat_num' => $seat_num,
                     'national_code' => fake()->randomNumber(9),
                     'created_at' => now()
                 ]);

                 $book->update([
                     'payed' => true,
                 ]);
             };
        }
    }
}
