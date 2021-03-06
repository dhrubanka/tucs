<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id', 'conversation_id', 'content',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
