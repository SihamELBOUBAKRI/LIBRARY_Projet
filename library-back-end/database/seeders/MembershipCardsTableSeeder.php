<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipCardsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('membership_cards')->insert([
            ['user_id' => 1, 'expiration_date' => now()->addYear()],
            ['user_id' => 2, 'expiration_date' => now()->addMonths(6)],
        ]);
    }
}
