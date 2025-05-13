<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'last_message_at',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function employeeSender()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employerSender()
    {
        return $this->belongsTo(Employer::class);
    }
}
