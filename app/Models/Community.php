<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_community_id',
        'name',
        'description',
        'image',
    ];

    public function parentCommunity(){
        return $this->belongsTo(ParentCommunity::class); //$product->category /
        //select * from category where product_id = 1
    }

}
