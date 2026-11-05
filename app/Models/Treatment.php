<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    protected $primaryKey = 'treatment_id';

    protected $fillable = [
        'nama_treatment',
        'kategori',
        'deskripsi',
        'durasi',
        'harga',
        'foto',
        'status',
    ];

    public function reservationItems()
    {
        return $this->hasMany(
            ReservationItem::class,
            'treatment_id',
            'treatment_id'
        );
    }
}