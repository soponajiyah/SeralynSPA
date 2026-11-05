<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'kode_reservasi',
        'user_id',
        'schedule_id',
        'total_harga',
        'status_reservasi',
        'catatan',
        'alasan_penolakan',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    public function schedule()
    {
        return $this->belongsTo(
            Schedule::class,
            'schedule_id',
            'schedule_id'
        );
    }

    public function items()
    {
        return $this->hasMany(
            ReservationItem::class,
            'reservation_id',
            'reservation_id'
        );
    }

    public function payment()
    {
        return $this->hasOne(
            Payment::class,
            'reservation_id',
            'reservation_id'
        );
    }
}