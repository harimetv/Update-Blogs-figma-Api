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
        Schema::create('family_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('person', ['public', 'private', 'onlyme'])->default('public');
            $table->text('bio')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->unsignedInteger('brothers')->nullable();
            $table->unsignedInteger('sisters')->nullable();
            $table->enum('family_type', ['joint', 'nuclear', 'others'])->nullable();
            $table->enum('family_status', ['middle_class', 'upper_middle_class', 'rich_migrant'])->nullable();
            $table->string('family_income')->nullable();
            $table->enum('family_values', ['moderate', 'conservative', 'liberal', 'orthodox'])->nullable();
            $table->enum('living_with_parents', ['yes', 'no', 'not_applicable'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_profiles');
    }
};
