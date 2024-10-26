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
        Schema::create('search_histories', function (Blueprint $table) {
            $table->id();
            $table->string('user_nim', 20);
            $table->string('lost_item_name');
            $table->dateTime('lost_date');
            $table->string('lost_location_option', 1024)->nullable();
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude column
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude column
            $table->foreign('user_nim')->references('nim')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_histories');
    }
};
