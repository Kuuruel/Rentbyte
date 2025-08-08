<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenant extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}

