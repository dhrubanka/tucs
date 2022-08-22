<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'companyName',
        'designation',
        'startDate',
        'current',
        'endDate',
        'profile_id',
    ];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

}
