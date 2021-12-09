<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    public function profiles(){
        return $this->belongsTo(Profile::class);
    }

    public function skillsets(){
        return $this->belongsTo(Skillset::class);
    }

}
