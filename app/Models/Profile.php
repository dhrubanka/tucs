<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class); //$product->category /
        //select * from category where product_id = 1
    }

    public function subscription(){
        return $this->hasMany(Subscription::class);
    }
}
