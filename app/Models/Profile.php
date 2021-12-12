<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subscription(){
        return $this->hasMany(Subscription::class);
    }

    public function userskills(){
        return $this->hasMany(UserSkill::class);
    }

    public function projects(){
        return $this->hasMany(UserSkill::class);
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

}
