<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            // Add category_id
            $table->foreignId('category_id')
                  ->nullable()
                  ->after('slug')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            // Add is_live
            $table->boolean('is_live')
                  ->default(true)
                  ->after('body');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'is_live']);
        });
    }
};
