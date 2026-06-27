<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('code')->nullable(); // state code, e.g. 'MH'
            $table->timestamps();

            // $table->unique(['country_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};