<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            ['user_id' => 1, 'total_price' => 15.99, 'status' => 'completed'],
            ['user_id' => 2, 'total_price' => 25.99, 'status' => 'pending'],
        ]);
    }
}
