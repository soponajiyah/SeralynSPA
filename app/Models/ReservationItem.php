<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationItem extends Model
{
    protected $table = 'reservation_items';

    protected $primaryKey = 'reservation_item_id';

    protected $fillable = [
        'reservation_id',
        'treatment_id',
        'durasi',
        'harga',
    ];

    public function reservation()
    {
        return $this->belongsTo(
            Reservation::class,
            'reservation_id',
            'reservation_id'
        );
    }

    public function treatment()
    {
        return $this->belongsTo(
            Treatment::class,
            'treatment_id',
            'treatment_id'
        );
    }
}