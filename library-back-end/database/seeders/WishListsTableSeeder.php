<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishListsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('wish_lists')->insert([
            ['user_id' => 1],
            ['user_id' => 2],
        ]);
    }
}
