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
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->unsignedInteger('therapist_id');
            $table->unsignedInteger('room_id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('status', 20);
            $table->timestamps();
            $table->foreign('therapist_id')
                ->references('therapist_id')
                ->on('therapists');
            $table->foreign('room_id')
                ->references('room_id')
                ->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
