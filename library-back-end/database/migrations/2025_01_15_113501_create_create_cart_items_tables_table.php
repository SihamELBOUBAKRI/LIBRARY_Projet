<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade'); // Foreign key to carts
            $table->foreignId('book_id')->constrained('book_to_sells')->onDelete('cascade'); // Foreign key to books
            $table->integer('quantity'); // Quantity of the book in the cart
            $table->decimal('price', 10, 2); // Price of the book at the time of adding to the cart
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_cart_items_tables');
    }
};
