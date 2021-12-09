<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCommunity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
    ];
    public function communities(){
        return $this->hasMany(Community::class);
    }

}
