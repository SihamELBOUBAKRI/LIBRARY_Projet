<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id(); // This creates BIGINT UNSIGNED by default
        $table->string('title');
        $table->unsignedBigInteger('author_id');
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->text('description')->nullable();
        $table->year('published_year')->nullable();
        $table->integer('stock')->default(0);
        $table->decimal('price', 8, 2)->nullable();
        $table->timestamps();
    });
}


    public function down() {
        Schema::dropIfExists('books');
    }
};
