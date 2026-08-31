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
       Schema::create('posts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('post_type_id')
        ->constrained('post_types')
        ->cascadeOnDelete();

    $table->foreignId('post_title_id')
        ->constrained('post_titles')
        ->cascadeOnDelete();

    $table->text('post_description');

    $table->string('media')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
