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

        $communities =Community::query()
        ->leftJoin('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->where('communities.name', 'LIKE', "%{$search}%")
        ->get();

        return view('search.index',['communities' => $communities , 'search' => $search]);
    }
}
