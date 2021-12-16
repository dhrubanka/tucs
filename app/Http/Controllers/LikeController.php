<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Dislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request){
        DB::table('likes')->insert([
            'profile_id' => Auth::user()->profile->id,
            'post_id' => $request['post_id']
        ]);

        $unlike = Dislike::query()
        ->where('dislikes.profile_id', '=', Auth::user()->profile->id)
        ->where('dislikes.post_id', '=', $request['post_id'])
        ->delete();

       return back();
    }

    public function unlike(Request $request){
        $unlike = Like::query()
        ->where('likes.profile_id', '=', Auth::user()->profile->id)
        ->where('likes.post_id', '=', $request['post_id'])
        ->delete();

       return back();
    }

}
