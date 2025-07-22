<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doorlockaccess extends Model
{
    protected $fillable = [
        'user_id',
        'doorlock_id',
        'company_id',
    ];
    
}
