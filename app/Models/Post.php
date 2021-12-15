<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function profile(){
        return $this->belongsTo(Profile::class); //$product->category /
        //select * from category where product_id = 1
    }
    public function community(){
        return $this->belongsTo(Community::class,'community_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
