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
        Schema::create('wish_list_items', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('wish_list_id')->constrained('wish_lists')->onDelete('cascade'); // Many-to-One with wish lists
            $table->foreignId('book_id')->constrained('book_to_sells')->onDelete('cascade'); // Many-to-One with books
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_list_items');
    }
};
