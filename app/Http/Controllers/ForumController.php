<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(Auth::check()){ 
         $posts = Post::query()
        ->join('subscriptions', function ($join) {
            $join->on('posts.community_id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })
        ->paginate(5);
        $communities = Community::query()
        ->join('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->get();
       // dd($posts);
        return view('forum.index', ['posts' => $posts, 'communities' => $communities]);
    }else{
        $posts= Post::paginate(5);;
        return view('forum.index', ['posts' => $posts]);
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

  


}
