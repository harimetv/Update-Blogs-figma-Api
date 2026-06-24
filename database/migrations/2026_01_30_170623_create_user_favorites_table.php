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
        Schema::create('user_favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('visibility');
            $table->string('favorite_food')->nullable();
            $table->string('favorite_books')->nullable();
            $table->string('favorite_music')->nullable();
            $table->string('favorite_sports')->nullable();
            $table->string('favorite_movies')->nullable();
            $table->string('favorite_tv_shows')->nullable();
            $table->string('favorite_vacation_place')->nullable();
            $table->string('favorite_actor_actress')->nullable();

            $table->timestamps();

            // FK
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_favorites');
    }
};
