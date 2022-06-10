<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
