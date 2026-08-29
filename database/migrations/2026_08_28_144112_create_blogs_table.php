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
        Schema::create('blogs', function (Blueprint $table) {

    $table->id();

    $table->string('title');

    $table->longText('description');

    $table->string('author_name');

    $table->foreignId('category_id')
        ->constrained('post_categories')
        ->cascadeOnDelete();

    $table->string('meta_title')->nullable();

    $table->text('meta_description')->nullable();

    $table->string('slug')->unique();

    $table->date('publish_date')->nullable();

    $table->enum('status', [
        'draft',
        'published'
    ])->default('draft');

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
