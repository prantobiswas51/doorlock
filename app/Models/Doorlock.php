<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doorlock extends Model
{
    use HasFactory;

    protected $fillable = ['identification', 'api_key', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function accessUsers()
    {
        return $this->belongsToMany(User::class, 'doorlock_access');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
