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

    public function works(){
        return $this->hasMany(Work::class);
    }

    public function educations(){
        return $this->hasMany(Education::class);
    }

    public function userSkills(){
        return $this->hasMany(UserSkill::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function projects(){
        return $this->hasMany(UserSkill::class);
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

}
