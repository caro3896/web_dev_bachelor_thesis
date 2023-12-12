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
        Schema::create('redeemed', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // Add foreign key for reward_id
            $table->unsignedBigInteger('reward_id')->nullable();
            $table->foreign('reward_id')->references('id')->on('rewards')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redeemed');
    }
};
