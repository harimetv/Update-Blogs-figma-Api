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
        Schema::create('favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('visibility', ['public', 'private', 'only_me'])->default('public');
            $table->string('favorite_food')->nullable();
            $table->string('favorite_books')->nullable();
            $table->string('favorite_music')->nullable();
            $table->string('favorite_sports')->nullable();
            $table->string('favorite_movies')->nullable();
            $table->string('favorite_tv_shows')->nullable();
            $table->string('favorite_vacation_place')->nullable();
            $table->string('favorite_actress_actor')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourites');
    }
};
