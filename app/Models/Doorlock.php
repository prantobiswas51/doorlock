<?php

namespace App\Models;

use App\Models\Fingerprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doorlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number', 
        'api_key',
        'company_id', 
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

   
}
