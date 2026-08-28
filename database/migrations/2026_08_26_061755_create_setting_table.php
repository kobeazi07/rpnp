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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('description');
            $table->string('meta');
            $table->string('no_wa');

            $table->text('link_ig');
            $table->text('link_facebook');
            $table->text('link_tiktok');
            $table->text('text_wa')->nullable();
            $table->text('embed_gmaps')->nullable();
            $table->text('link_gmaps')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
