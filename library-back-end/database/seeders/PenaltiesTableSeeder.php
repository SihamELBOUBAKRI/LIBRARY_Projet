<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenaltiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('penalties')->insert([
            ['user_id' => 1, 'amount' => 5.00, 'reason' => 'Late return'],
        ]);
    }
}
