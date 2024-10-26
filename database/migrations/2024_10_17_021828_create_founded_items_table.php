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
        Schema::create('founded_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo', 2048);
            $table->dateTime('found_date');
            $table->string('location_option', 1024)->nullable();
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude column
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude column
            $table->string('user_nim', 20);
            $table->foreign('user_nim')->references('nim')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founded_items');
    }
};
