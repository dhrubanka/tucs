<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date_time',
        'end_date_time',
        'organizer',
        'mode',
        'venue',
        'link',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
