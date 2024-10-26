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
        Schema::create('claim_histories', function (Blueprint $table) {
            $table->id();
            $table->string('user_nim', 20);
            $table->unsignedBigInteger('founded_item');
            $table->string('ip', 100);
            $table->string('validation_photo_items', 2048)->nullable();
            $table->foreign('user_nim')->references('nim')->on('users');
            $table->foreign('founded_item')->references('id')->on('founded_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_histories');
    }
};
