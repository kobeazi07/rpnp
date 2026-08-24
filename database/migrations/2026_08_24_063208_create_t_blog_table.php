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
        Schema::create('t_blog', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_id')
                ->constrained('blog')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('tag_id')
                ->constrained('tag')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unique(['blog_id', 'tag_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_blog');
    }
};
