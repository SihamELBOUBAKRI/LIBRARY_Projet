<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('rentals')->insert([
            ['book_id' => 1, 'user_id' => 1, 'rental_date' => now(), 'return_date' => now()->addDays(14)],
            ['book_id' => 2, 'user_id' => 2, 'rental_date' => now(), 'return_date' => now()->addDays(10)],
        ]);
    }
}
