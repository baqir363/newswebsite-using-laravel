<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('slug');
            $table->string('source');
            $table->text('excerpt');
            $table->text('content');
            $table->text('image')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('city_id')->nullable();
            $table->timestampTz('published_at', $precision = 0)->nullable();
            $table->timestampsTz($precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
