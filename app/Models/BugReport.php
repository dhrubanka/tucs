<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profile(){
        return $this->hasOne(Profile::class); 
    }
}
