<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use App\Models\Post;
use App\Models\Skillset;
use App\Models\UserSkill;
use App\Models\Education;
use App\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $educations = Education::where('profile_id','=', $user->profile->id)->get();
        $works = Work::where('profile_id','=', $user->profile->id)->get();
      //  ddd($posts);
      //dd($profile->userSkills[0]);

        return view("profile.index", ['profile' => $profile, 'skillsets' => $skillset, 'projects' => $projects, 'posts' => $posts, 'works' => $works, 'educations' => $educations]);
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
    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return view("profile.edit",['user'=>$user]);
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
       $user = User::find(Auth::user()->id);
       $profile = Profile::where('user_id',Auth::user()->id)->first();

       $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            
            
            'gender' => ['required'],
            'phone' => ['required', 'digits_between:10,12'],
            'firstName' => ['required', 'string','max:255'],
            'lastName' => ['required','string','max:255'],
            'dob' => ['required'],
            'role' => ['required'],
            'city' => ['required','string','max:255'],
            'state' => ['required','string','max:255'],
            'zip' => ['required','string','max:255'],
            'currentAddress' => ['required'],
            'permanentAddress' => ['required']

        ]);

        $image = NULL;
            if (request('image')) {
                Storage::delete($profile->image);
                $image = request('image')->store('profile_images');
            }
            if(request('password') != null){
                $user->update([
                    'password' => Hash::make($request['password']),

                ]);
            }
            $user->update([
                'username' => $request['username'],
                // 'email' => $request['email'],
              
            ]);
            $profile->update([
                'user_id' => $user->id,
                'firstName' =>  $request['firstName'],
                'lastName' =>  $request['lastName'],
                'city' =>  $request['city'],
                'state' =>  $request['state'],
                'zip' =>  $request['zip'],
                'currentAddress' =>  $request['currentAddress'],
                'permanentAddress' =>  $request['permanentAddress'],
                'gender' =>  $request['gender'],
                'phone' =>  $request['phone'],
                'dob' =>  $request['dob'],

                'image' => $image,
            ]);

            $affected = DB::table('model_has_roles')
                ->where('model_id', Auth::user()->id)
                ->update(['role_id' => $request['role']]);
            //write your logic for web call
            // $user->assignRole($data['role']);
            return back()->with('success', 'Successfully updated!');
       
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
