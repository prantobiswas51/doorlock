<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'company_id',
        'lock_password',
        'fingerprint_data',
        'image_data',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
