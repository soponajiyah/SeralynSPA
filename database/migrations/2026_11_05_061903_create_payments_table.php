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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->unsignedInteger('reservation_id')->unique();
            $table->decimal('total_amount', 12, 2);
            $table->unsignedInteger('dp_percentage');
            $table->decimal('dp_amount', 12, 2);
            $table->string('payment_method', 20);
            $table->string('proof_image', 255)->nullable();
            $table->string('payment_status', 30);
            $table->text('rejection_reason')->nullable();
            $table->unsignedInteger('verified_by')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->timestamps();
            $table->foreign('reservation_id')
                ->references('reservation_id')
                ->on('reservations');
            $table->foreign('verified_by')
                ->references('user_id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
