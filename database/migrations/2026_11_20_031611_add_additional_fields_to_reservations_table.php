
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unsignedSmallInteger('additional_minutes')
                ->default(0);

            $table->decimal('room_fee', 12, 2)
                ->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn([
                'additional_minutes',
                'room_fee',
            ]);
        });
    }
};
