<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $table = 'therapists';

    protected $primaryKey = 'therapist_id';

    protected $fillable = [
        'nama_terapis',
        'status',
    ];

    public function schedules()
    {
        return $this->hasMany(
            Schedule::class,
            'therapist_id',
            'therapist_id'
        );
    }
}