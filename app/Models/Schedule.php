<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'therapist_id',
        'room_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function therapist()
    {
        return $this->belongsTo(
            Therapist::class,
            'therapist_id',
            'therapist_id'
        );
    }

    public function room()
    {
        return $this->belongsTo(
            Room::class,
            'room_id',
            'room_id'
        );
    }

    public function reservations()
    {
        return $this->hasMany(
            Reservation::class,
            'schedule_id',
            'schedule_id'
        );
    }
}