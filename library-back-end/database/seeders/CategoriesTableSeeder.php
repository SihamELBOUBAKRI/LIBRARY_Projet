<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
{
    DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
    DB::table('categories')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks

    // Insert unique category names
    $categories = [
        ['name' => 'Fiction', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Science Fiction', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Mystery', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Romance', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Horror', 'created_at' => now(), 'updated_at' => now()],
    ];

    DB::table('categories')->delete(); // Deletes all rows without resetting auto-increment
    DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1;'); // Reset auto-increment manually

}
}
