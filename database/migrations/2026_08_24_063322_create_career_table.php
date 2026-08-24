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
        Schema::create('career', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('deadline')->nullable();
            $table->string('location')->nullable();

            $table->foreignId('kategori_career')
                ->constrained('kategori_career')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->text('requirement')->nullable();
            $table->string('link_daftar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};
