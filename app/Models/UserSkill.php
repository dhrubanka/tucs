<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function skill(){
        return $this->belongsTo(Skillset::class, 'skillset_id');
    }

}
