<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'content',
    ];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
