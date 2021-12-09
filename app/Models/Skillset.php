<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skillset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function userskills(){
        return $this->hasMany(UserSkill::class);
    }

}
