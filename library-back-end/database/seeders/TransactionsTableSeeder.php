<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            ['order_id' => 1, 'payment_method' => 'credit card', 'status' => 'completed'],
            ['order_id' => 2, 'payment_method' => 'paypal', 'status' => 'pending'],
        ]);
    }
}
