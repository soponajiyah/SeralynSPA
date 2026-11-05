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
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('reservation_id');
            $table->string('kode_reservasi', 30)->unique();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('schedule_id');
            $table->decimal('total_harga', 12, 2);
            $table->string('status_reservasi', 30);
            $table->text('catatan')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users');
            $table->foreign('schedule_id')
                ->references('schedule_id')
                ->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
