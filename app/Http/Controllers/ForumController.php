<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Dislike;
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
        ->orderby('posts.created_at','desc')
        // ->leftJoin('likes', function ($join2) {
        //     $join2->on('posts.id', '=', 'likes.post_id')
        //     ->where('likes.profile_id', '=', Auth::user()->profile->id);
        // })
        // ->leftJoin('dislikes', function ($join3) {
        //     $join3->on('posts.id', '=', 'dislikes.post_id')
        //     ->where('dislikes.profile_id', '=', Auth::user()->profile->id);
        // })
        ->paginate(5);


        
        // ddd($posts);
        $communities = Community::query()
        ->join('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->get();

        // $postLike = Post::query()
        // ->leftJoin('likes', function ($join){
        //     $join->on('posts.id', '=', 'likes.post_id')
        //     ->where('likes.profile_id', '=', Auth::user()->profile->id);
        // })->get();

        // $postDislike = Post::query()
        // ->leftJoin('dislikes', function ($join){
        //     $join->on('posts.id', '=', 'dislikes.post_id')
        //     ->where('dislikes.profile_id', '=', Auth::user()->profile->id);
        // })->get();

        // dd($posts);
        return view('forum.index', ['posts' => $posts, 'communities' => $communities]);
    }else{

        $posts= Post::orderby('created_at','desc')->paginate(5);;
        return view('forum.index', ['posts' => $posts]);
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function explore(Forum $forum)
    {
        $allCommunities = Community::all();

        if(Auth::check()){ 
            $communities = Community::query()
        ->join('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->get();
        return view('forum.explore', ['communities' => $communities, 'allcommunitites' => $allCommunities]);
        }else{
            return view('forum.explore', ['allcommunitites' => $allCommunities]);
        }
    }

  


}
