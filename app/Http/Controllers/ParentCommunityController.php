<?php

namespace App\Http\Controllers;

use App\Models\ParentCommunity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParentCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCommunity = ParentCommunity::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.forum.parent_community.index', ['ParentCommunites' => $parentCommunity]);
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
            'communityTitle' => 'required|string|max:255',
        ]);
        ParentCommunity::create([
            'name' => strtoupper(Str::of(request('communityTitle'))->trim()),
            'description' => request('communityDesc'),
            'image' => request('communityPhoto')
        ]);

        return back()->with('success', 'Successfully inserted a new parent community!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParentCommunity  $parentCommunity
     * @return \Illuminate\Http\Response
     */
    public function show(ParentCommunity $parentCommunity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParentCommunity  $parentCommunity
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCommunity $parentCommunity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParentCommunity  $parentCommunity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentCommunity $parentCommunity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParentCommunity  $parentCommunity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentCommunity $parentCommunity)
    {
        //
    }
}
