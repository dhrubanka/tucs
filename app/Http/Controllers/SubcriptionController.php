<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;
class SubcriptionController extends Controller
{
    public function subscribe(Request $request){
        DB::table('subscriptions')->insert([
            'profile_id' => Auth::user()->profile->id,
            'community_id' => $request['community_id']
        ]);
     //   ddd($request('search'));
       return back();
    }

    public function unsubscribe(Request $request){

        $subscription = Subscription::query()
        ->where('subscriptions.profile_id', '=', Auth::user()->profile->id)
        ->where('subscriptions.community_id', '=', $request['community_id'])
        ->delete();

        return back();
    }

    public function subscribeS(Request $request){
        DB::table('subscriptions')->insert([
            'profile_id' => Auth::user()->profile->id,
            'community_id' => $request['community_id']
        ]);
     //   ddd($request('search'));
       return redirect()->action(
        [SearchController::class, 'search'], ['search' => request('search')] );
    }

    public function unsubscribeS(Request $request){

        $subscription = Subscription::query()
        ->where('subscriptions.profile_id', '=', Auth::user()->profile->id)
        ->where('subscriptions.community_id', '=', $request['community_id'])
        ->delete();

        return redirect()->action(
            [SearchController::class, 'search'], ['search' => request('search')] );
    }
}
