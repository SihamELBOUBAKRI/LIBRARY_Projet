<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveRentalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('active_rentals')->insert([
            ['rental_id' => 1, 'user_id' => 1, 'book_id' => 1],
        ]);
    }
}
