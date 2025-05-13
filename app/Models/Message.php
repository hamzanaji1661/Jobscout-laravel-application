<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'recipient_id',
        'is_read',
        'type',
        'body',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function employeeSender()
    {
        return $this->belongsTo(Employee::class, 'sender_id');
    }

    public function employerSender()
    {
        return $this->belongsTo(Employer::class, 'sender_id');
    }
}
