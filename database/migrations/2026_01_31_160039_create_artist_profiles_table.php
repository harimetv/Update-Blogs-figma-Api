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
        Schema::create('artist_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('visibility');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('bust_chest')->nullable();
            $table->string('hip')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('body_type')->nullable();

            // interests & comfort (multi select)
            $table->json('interestes_in')->nullable();
            $table->json('comfortable_in')->nullable();

            // languages
            $table->json('languages')->nullable();

            // contact & bio
            $table->string('phone_number', 20)->nullable();
            $table->text('bio')->nullable();

            // managed by
            $table->string('managed_by')->nullable();

            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_profiles');
    }
};
