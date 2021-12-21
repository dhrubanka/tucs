<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use App\Models\Post;
use App\Models\Skillset;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        $user= User::find($id);
        $skillset =Skillset::query()
        ->whereNotIn('id', function($query) use(&$user) {
//            $query=UserSkill::where('user_skills.profile_id', $id)->first();
            $query->select('user_skills.skillset_id')
            ->from('user_skills')
            ->where('user_skills.profile_id', '=', $user->profile->id);
        })->get();
        $projects = Project::where('profile_id','=', $user->profile->id)->get();
        $posts = Post::where('profile_id','=', $user->profile->id)->get();
      //  ddd($posts);
      // dd($profile->userSkills[0]);
        
        return view("profile.index", ['profile' => $profile, 'skillsets' => $skillset, 'projects' => $projects, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
