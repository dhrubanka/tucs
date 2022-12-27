<?php

namespace App\Http\Controllers;

use App\Models\ParentCommunity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        return view('admin.forum.parent_community.create');
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
            'slug' => 'required|unique:parent_communities,slug'
        ]);
        ParentCommunity::create([
            'name' => strtoupper(Str::of(request('communityTitle'))->trim()),
            'slug' => str_replace(' ', '-', strtolower(request('slug'))),
            'description' => request('communityDesc'),
            'image' => request('communityPhoto')
        ]);

        return redirect()->route('parentCommunity')->with('success', 'Successfully inserted a new parent community!');


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


    public function edit($id)
    {
        $parentCommunity = ParentCommunity::where('id','=',$id)->first();
        return view('admin.forum.parent_community.edit', ['parentCommunity' => $parentCommunity]);
    }
 
 
 
     public function update(Request $request, $id)
     {
         DB::table('parent_communities')
               ->where('id', $id)
               ->update(['name' => request('communityTitle') , 'description' => request('communityDesc') , 'slug' => request('slug')]);
 
               return redirect()->route('parentCommunity')->with('success', 'Successfully updated community!');
             }
 
     public function delete($id)
     {
        ParentCommunity::where('id', $id)->delete();
 
         return redirect()->route('parentCommunity')->with('success', 'Successfully deleted parent community!');

     }
  

}
