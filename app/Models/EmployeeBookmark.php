<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBookmark extends Model
{
    use HasFactory;

    public function jobdetails()
    {
        return $this->belongsTo(Hiring::class, 'job_id', 'id');
    }
}
