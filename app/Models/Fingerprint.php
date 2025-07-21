<?php

namespace App\Models;

use App\Models\Doorlock;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    protected $fillable = [
        'fingerprint_id',
        'fingerprint_data',
        'doorlock_id',
        'company_id',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function doorlock()
    {
        return $this->belongsTo(Doorlock::class);
    }
}
