<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;

    public function jobcategory()
    {
        return $this->belongsTo(JobCategory::class, 'category');
    }

    public function joblocation()
    {
        return $this->belongsTo(Location::class, 'location');
    }

    public function jobtype()
    {
        return $this->belongsTo(JobType::class, 'type');
    }

    public function salaryrange()
    {
        return $this->belongsTo(SalaryRange::class, 'salary');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experiance');
    }

    public function requirement()
    {
        return $this->hasMany(Requirement::class, 'token', 'token');
    }

    public function jobemployers()
    {
        return $this->belongsTo(Employer::class, 'company_id');
    }

    public function boostingdetails()
    {
        return $this->hasMany(BoostOrder::class, 'package_id', 'id');
    }

}
