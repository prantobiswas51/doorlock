<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function admins()
    {
        return $this->hasMany(User::class);
    }

    public function doorlocks()
    {
        return $this->hasMany(Doorlock::class);
    }
}
