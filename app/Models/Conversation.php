<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1', 'user2', 'content',
    ];


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
