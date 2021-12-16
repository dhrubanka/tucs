<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'profile_id',
    ];


    public function profile(){
        return $this->belongsTo(Profile::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }

}
