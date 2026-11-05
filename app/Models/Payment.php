<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'reservation_id',
        'total_amount',
        'dp_percentage',
        'dp_amount',
        'payment_method',
        'proof_image',
        'payment_status',
        'rejection_reason',
        'verified_by',
        'verified_at',
        'expires_at',
    ];

    public function reservation()
    {
        return $this->belongsTo(
            Reservation::class,
            'reservation_id',
            'reservation_id'
        );
    }

    public function verifier()
    {
        return $this->belongsTo(
            User::class,
            'verified_by',
            'user_id'
        );
    }
}