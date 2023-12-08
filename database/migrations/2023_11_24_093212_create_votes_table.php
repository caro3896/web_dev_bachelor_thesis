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
        Schema::create('votes', function (Blueprint $table) {
            $table->timestamps();
            // Add foreign key for user_id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Add foreign key for reward_id
            $table->unsignedBigInteger('reward_id')->nullable();
            $table->foreign('reward_id')->references('id')->on('rewards')->onDelete('set null');

            // Opret compound key
            $table->primary(['user_id', 'reward_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
