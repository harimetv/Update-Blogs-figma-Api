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
        Schema::create('user_lifestyles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('person')->nullable();
            $table->json('languages')->nullable();
            $table->json('hobbies')->nullable();
            // habits
            $table->enum('diet', ['vegetarian', 'non_vegetarian', 'eggetarian'])->nullable();
            $table->enum('drinking', ['yes', 'no', 'occasionally'])->nullable();
            $table->enum('smoking', ['yes', 'no', 'occasionally'])->nullable();

            // assets
            $table->boolean('own_house')->default(false);
            $table->boolean('own_car')->default(false);

            // cooking / food
            // $table->json('food_cook')->nullable();
            $table->string('food_cook')->nullable();

            $table->timestamps();

            // FK
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lifestyles');
    }
};
