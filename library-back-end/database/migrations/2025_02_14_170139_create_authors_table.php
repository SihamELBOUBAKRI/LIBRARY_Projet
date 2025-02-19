<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // This creates BIGINT UNSIGNED by default
            $table->string('name');
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }
    

    public function down() {
        Schema::dropIfExists('authors');
    }
};
