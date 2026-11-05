<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $primaryKey = 'room_id';

    protected $fillable = [
        'tipe_kamar',
        'nomor_kamar',
        'status',
        'keterangan',
    ];

    public function schedules()
    {
        return $this->hasMany(
            Schedule::class,
            'room_id',
            'room_id'
        );
    }
}