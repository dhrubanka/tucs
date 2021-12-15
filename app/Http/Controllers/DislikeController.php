<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DislikeController extends Controller
{
    public function dislike(Request $request){
        DB::table('dislikes')->insert([
            'profile_id' => Auth::user()->profile->id,
            'post_id' => $request['post_id']
        ]);
        $like = Like::query()
        ->where('likes.profile_id', '=', Auth::user()->profile->id)
        ->where('likes.post_id', '=', $request['post_id'])
        ->delete();

       return back();
    }

    public function undislike(Request $request){
        $unlike = Dislike::query()
        ->where('dislikes.profile_id', '=', Auth::user()->profile->id)
        ->where('dislikes.post_id', '=', $request['post_id'])
        ->delete();
       return back();
    }

}
