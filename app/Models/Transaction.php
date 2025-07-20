<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'timestamp', 'doorlock_id', 'user_id', 'api_key', 'status', 'notes'
    ];

    public function doorlock()
    {
        return $this->belongsTo(Doorlock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
