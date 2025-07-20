<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingFingerprint extends Model
{
    protected $fillable = [
        'fingerprint_id',
        'fingerprint_data',
        'doorlock_id',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
