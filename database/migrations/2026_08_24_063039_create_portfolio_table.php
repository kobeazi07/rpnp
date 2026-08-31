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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('buildingtype_id')
                ->constrained('building_type')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('kategori_portfolio_id')
                ->constrained('kategori_portfolio')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->text('sow')->nullable();
            $table->text('slug')->nullable();
            $table->text('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
