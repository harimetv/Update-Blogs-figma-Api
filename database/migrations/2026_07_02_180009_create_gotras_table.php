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
        Schema::create('gotras', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // गोत्र का नाम, e.g., 'Kashyap', 'Bharadwaj'
            $table->string('code')->nullable(); // optional code, e.g., 'KAS', 'BHA'
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gotras');
    }
};
