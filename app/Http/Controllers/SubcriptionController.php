<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubcriptionController extends Controller
{
    public function subscribe(Request $request){
        DB::table('subscriptions')->insert([
            'profile_id' => Auth::user()->profile->id,
            'community_id' => $request['community_id']
        ]);

    }

    public function unsubscribe(Request $request){

        $subscription = Subscription::query()
        ->where('subscriptions.profile_id', '=', Auth::user()->profile->id)
        ->where('subscriptions.community_id', '=', $request['community_id'])
        ->delete();
    }
}
