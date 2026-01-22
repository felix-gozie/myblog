<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->date('earned_at');
        });
    }
    public function down() {
        Schema::dropIfExists('earnings');
    }
};
