<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    public function hiring()
    {
        return $this->belongsTo(Hiring::class, 'token', 'token');
    }
}
