<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    function index(){
        $projects = Project::where('approval','=','Y')->paginate(5);
        return view('projects.index', ['projects'=>$projects]);
    }

    function show(){
        return view('projects.show');
    }
    function store(Request $request){
         //   ddd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'domain' => 'required', 
        ]);

        Project::create([
            'title' => request('title'),
            'description' => request('description'),
            'url' => request('url'),
            'domain' => request('domain'), 
            'profile_id' => Auth::user()->profile->id,
        ]);

        return back()->with('success', 'Successfully Submitted Project! Waiting for Approval.. keep patience');
    }

    function create(){
        return view('projects.create');
    }

    function myprojects(){
        $projects = Project::where('profile_id','=', Auth::user()->profile->id)->paginate(5);

        return view('projects.myprojects', ['projects'=>$projects]);
    }
}
