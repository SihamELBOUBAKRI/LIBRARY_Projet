<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'image' => 'gatsby.jpg',
                'title' => 'The Great Gatsby',
                'author_id' => 1,
                'category_id' => 1,
                'description' => 'A classic novel by F. Scott Fitzgerald.',
                'published_year' => 1925,
                'stock' => 10,
                'price' => 15.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => '1984.jpg',
                'title' => '1984',
                'author_id' => 2,
                'category_id' => 2,
                'description' => 'A dystopian novel by George Orwell.',
                'published_year' => 1949,
                'stock' => 5,
                'price' => 12.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'mockingbird.jpg',
                'title' => 'To Kill a Mockingbird',
                'author_id' => 3,
                'category_id' => 3,
                'description' => 'A novel by Harper Lee about racial injustice.',
                'published_year' => 1960,
                'stock' => 8,
                'price' => 10.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
