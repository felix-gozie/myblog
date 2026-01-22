<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->string('source')->nullable();
            $table->date('view_date');
            $table->integer('views')->default(1);
        });
    }
    public function down() {
        Schema::dropIfExists('page_views');
    }
};