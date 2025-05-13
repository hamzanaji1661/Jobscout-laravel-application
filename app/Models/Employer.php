<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use HasFactory;

    public function countEmployer()
    {
        return $this->hasMany(Hiring::class, 'company_id', 'id');
    }

    public function getLocations()
    {
        return $this->belongsTo(EmployerLocation::class, 'address_id', 'id');
    }
}
