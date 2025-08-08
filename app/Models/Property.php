<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'tenant_id',
        'name',
        'type',
        'address',
        'price',
        'rent_type',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
