<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookPurchasesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('book_purchases')->insert([
            ['user_id' => 1, 'book_id' => 1, 'purchase_date' => now()],
        ]);
    }
}
