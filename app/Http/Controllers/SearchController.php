<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Community;
use App\Models\ParentCommunity;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SearchController extends Controller
{
    public function search(Request $request){
        $search = request('search');

        // CREATE VIEW view_user_data AS
        // SELECT
        //     subscriptions.community_id,
        //     (SELECT profile_id FROM subscriptions
        //         WHERE subscriptions.profile_id = Auth::user()->profile->user_id
        //         ) as user_id,
        // FROM subscriptions


         $user_suscriptions = DB::table('subscriptions')
        ->where('profile_id','=', Auth::user()->profile->user_id);
        $communities = DB::table('communities')
        ->where('name', 'LIKE', "%{$search}%")
        //->join('subscriptions', 'communities.id', '=', 'subscriptions.community_id')
        //->where('subscriptions.profile_id','=', Auth::user()->profile->user_id)
        ->union($user_suscriptions)
        ->get();


        ddd( $communities);
        //$check = DB::table('subscriptions')->where('community_id','=', $item->id)->where('profile_id','=', Auth::user()->profile->user_id)->first();
        return view('search.index',['communities' => $communities]);
    }
}
