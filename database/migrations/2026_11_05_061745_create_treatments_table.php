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
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('treatment_id');
            $table->string('nama_treatment', 100);
            $table->string('kategori', 50);
            $table->text('deskripsi');
            $table->unsignedInteger('durasi');
            $table->decimal('harga', 12, 2);
            $table->string('foto', 255);
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
