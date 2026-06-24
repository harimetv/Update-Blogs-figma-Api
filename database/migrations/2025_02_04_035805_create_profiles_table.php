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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->text('headline')->nullable();
            $table->text('about')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
