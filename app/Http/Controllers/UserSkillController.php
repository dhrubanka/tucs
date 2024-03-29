<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserSkill;


class UserSkillController extends Controller
{
    
    public function store(Request $request){
        DB::table('user_skills')->insert([
            'profile_id' => Auth::user()->profile->id,
            'skillset_id' => $request['skillId']
        ]);

       return back();
    }

    public function delete(Request $request, $id)
    {
         $userSkill = UserSkill::find($id)->delete();
        return back();
    }
 

}
