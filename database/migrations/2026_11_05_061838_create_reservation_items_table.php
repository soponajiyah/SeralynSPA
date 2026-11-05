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
        Schema::create('reservation_items', function (Blueprint $table) {
            $table->increments('reservation_item_id');
            $table->unsignedInteger('reservation_id');
            $table->unsignedInteger('treatment_id');
            $table->unsignedInteger('durasi');
            $table->decimal('harga', 12, 2);
            $table->timestamps();
            $table->foreign('reservation_id')
                ->references('reservation_id')
                ->on('reservations');
            $table->foreign('treatment_id')
                ->references('treatment_id')
                ->on('treatments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_items');
    }
};
