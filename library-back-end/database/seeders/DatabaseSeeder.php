<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class, // Ensure categories are seeded first
            AuthorsTableSeeder::class,   // Ensure authors exist
            BooksTableSeeder::class,     // Then seed books
        ]);
    }
    
}
