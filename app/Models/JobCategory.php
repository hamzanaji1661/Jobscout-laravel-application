<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    public function jobcatcount()
    {
        return $this->hasMany(Hiring::class, 'category', 'id')->where('status', '=', 'Published');
    }
}
