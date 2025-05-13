<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeApplication extends Model
{
    use HasFactory;

    public function jobdetails()
    {
        return $this->belongsTo(Hiring::class, 'job_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

}
