<?php

namespace App\Http\Controllers;

use App\Models\CommunityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('communityrequest');
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
            'name' => 'required',
            'description' => 'required|string',
             
        ]);
        CommunityRequest::create([
            'name' => request('name'),
             
           
            'desc' => request('description'),
            'profile_id' =>  Auth::user()->profile->id
        ]);

        return back()->with('success', 'Request Complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommunityRequest  $communityRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CommunityRequest $communityRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommunityRequest  $communityRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunityRequest $communityRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommunityRequest  $communityRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunityRequest $communityRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommunityRequest  $communityRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunityRequest $communityRequest)
    {
        //
    }
}
