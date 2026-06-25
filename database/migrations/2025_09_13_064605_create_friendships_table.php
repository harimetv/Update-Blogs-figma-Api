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
        Schema::create('friendships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sender_id')->nullable();   // user who sends request
            $table->unsignedBigInteger('receiver_id')->nullable(); // user who receives request
            $table->enum('status', all_status())->default(is_pending());
            $table->timestamps();
            $table->unique(['sender_id', 'receiver_id']); // prevent duplicate requests
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
