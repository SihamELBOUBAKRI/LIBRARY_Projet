<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $tables = [
            'active_rentals',
            'authors',
            'author_book',
            'books',
            'book_categories',
            'book_purchases',
            'failed_jobs',
            'membership_cards',
            'migrations',
            'orders',
            'penalties',
            'personal_access_tokens',
            'rentals',
            'transactions',
            'users',
            'wish_lists',
            'wish_list_items'
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                if (!Schema::hasColumn($table->getTable(), 'image')) {
                    $table->string('image')->nullable()->after('id');
                }
            });
        }
    }

    public function down()
    {
        $tables = [
            'active_rentals',
            'authors',
            'author_book',
            'books',
            'book_categories',
            'book_purchases',
            'failed_jobs',
            'membership_cards',
            'migrations',
            'orders',
            'penalties',
            'personal_access_tokens',
            'rentals',
            'transactions',
            'users',
            'wish_lists',
            'wish_list_items'
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
};
