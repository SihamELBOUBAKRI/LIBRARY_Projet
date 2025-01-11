<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insert Authors
        DB::table('authors')->insert([
            ['name' => 'Author One', 'biography' => 'Biography of Author One', 'date_of_birth' => '1970-01-01', 'date_of_death' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Author Two', 'biography' => 'Biography of Author Two', 'date_of_birth' => '1980-05-15', 'date_of_death' => '2020-08-01', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Categories
        DB::table('categories')->insert([
            ['name' => 'Fiction', 'description' => 'Fictional books', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Science', 'description' => 'Scientific books', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Customers
        DB::table('customers')->insert([
            ['name' => 'John Doe', 'email' => 'john.doe@example.com', 'phone_number' => '123456789', 'address' => '123 Street', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'phone_number' => '987654321', 'address' => '456 Avenue', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Members (Make sure customer_id exists in the customers table)
        DB::table('members')->insert([
            ['customer_id' => 1, 'cin' => 'CIN123', 'gender' => 'male', 'birthday' => '1985-06-15', 'membership_start_date' => now(), 'membership_end_date' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Books to Sell
        DB::table('book_to_sells')->insert([
            ['title' => 'Book One', 'description' => 'A great book', 'cover_image' => null, 'price' => 20.00, 'stock_quantity' => 10, 'author_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Books to Rent
        DB::table('book_to_rents')->insert([
            ['title' => 'Rental Book One', 'description' => 'A rental book', 'rental_price_per_day' => 2.50, 'available_quantity' => 5, 'cover_image' => null, 'author_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Orders
        DB::table('orders')->insert([
            ['customer_id' => 1, 'total_price' => 40.00, 'status' => 'completed', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Order-Book relationships
        DB::table('order_book')->insert([
            ['order_id' => 1, 'book_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Transactions
        DB::table('transactions')->insert([
            ['order_id' => 1, 'transaction_date' => now(), 'payment_method' => 'card', 'status' => 'successful', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Wishlists
        DB::table('wishlists')->insert([
            ['customer_id' => 1, 'book_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Track Active Rental Books
        DB::table('track_active_rental_books')->insert([
            ['customer_id' => 1, 'book_id' => 1, 'start_date' => now(), 'due_date' => now()->addDays(7), 'return_date' => null, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert Carts
        DB::table('carts')->insert([
            ['customer_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
