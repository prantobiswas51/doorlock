<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'fingerprint_id', 
        'user_id', 
        'transaction_type', 
        'doorlock_id',
        'fingerprint_data',
        'image_data',
        'opened_at',
        'closed_at',
        'company_id',
        'status'
    ];

    public function doorlock() {
        return $this->belongsTo(Doorlock::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
