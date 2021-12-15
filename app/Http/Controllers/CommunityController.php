<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\ParentCommunity;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $community = Community::orderBy('created_at', 'desc')->paginate(15);
        $parentCommunity = ParentCommunity::orderBy('name')->get();
        return view('admin.forum.community.index', ['communites' => $community, 'parentCommunities' => $parentCommunity]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'parentId' => 'required',
            'communityTitle' => 'required|string|max:255',
            'slug' => 'required|unique:communities,slug'
        ]);
        Community::create([
            'parent_community_id' => request('parentId'),
            'name' => strtoupper(Str::of(request('communityTitle'))->trim()),
            'slug' => request('slug'),
            'description' => request('communityDesc'),
            'image' => request('communityPhoto')
        ]);

        return back()->with('success', 'Successfully inserted a new community!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $community = Community::where('slug', '=', $id)->first();

        $community = Community::query()
        ->leftJoin('subscriptions', function ($join) {
            $join->on('communities.id', '=', 'subscriptions.community_id')
            ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        })->where('slug', '=', $id)->first();

        $posts = Post::where('community_id','=',$community->id)
               // ->where('user_id','=', Auth::user()->id)
                ->get();

        // $subscription =Community::query()
        // ->leftJoin('subscriptions', function ($join) {
        //     $join->on('communities.id', '=', 'subscriptions.community_id')
        //     ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
        // })->where('communities.slug', '=', $id)
        // ->first();
        
//        dd($posts);
        return view('forum.show', ['communites' => $community, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
