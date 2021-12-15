<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Community;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities =Community::query()
        ->join('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })
        ->get();

        return view('forum.create',['communities' => $communities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'community_id' => 'required',
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);
        Post::create([
            'community_id' => request('community_id'),
            'profile_id' => Auth::user()->profile->id,
            'title' => request('title'),
            'content' => request('content'),
        ]);

        return back()->with('success', 'Successfully Posted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$id)
    {
        $post = Post::find($id);
        $memberstot = Subscription::where('community_id',$post->community_id);
        $members= $memberstot->count();
        $comments= Comment::where('post_id', $id)->count();

        $community = Community::query()
        ->leftJoin('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->where('id', '=', $post->community->id)->first();

        return view('forum.post.index', ['post' => $post,'members'=>$members, 'comments'=>$comments, 'communities'=>$community]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
