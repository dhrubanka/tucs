<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skillset;
use Illuminate\Support\Str;


class SkillsetController extends Controller
{
    public function index()
    {
        $skillSet = Skillset::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.skills.skillset', ['SkillSets' => $skillSet]);
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
           'skillName' => 'required|string|max:255',
       ]);
       $skill = Skillset::create([
           'name' => strtoupper(Str::of(request('skillName'))->trim()),
       ]);

       return back()->with('success', 'Successfully inserted a new skill '.$skill->name);

   }

   public function delete(Request $request, $id)
   {
        $skill = Skillset::find($id);
        $skill->delete();
       return back()->with('success', 'Successfully deleted skill '.$skill->name);
   }


}
