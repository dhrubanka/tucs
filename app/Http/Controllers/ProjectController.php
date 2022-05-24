<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    function index(){
        $projects = Project::where('approval','=','Y')->where('permission','=', 'public')->paginate(12);
        return view('projects.index', ['projects'=>$projects]);
    }

    function show($id){
        $project = Project::find($id);
        return view('projects.show',['project'=> $project]);
    }
    function store(Request $request){
           
        $request->validate([
            'title' => 'required',
            'description' => 'required', 
            'domain' => 'required',
            'project_source_zip' => 'nullable|mimes:zip|max:10000',
            'permission'=> 'required'
        ]);

        $file = NULL;
            if (request('project_source_zip')) {
                $file = request('project_source_zip')->store('project_files');
            }

        $validate = Project::create([
            'title' => request('title'),
            'description' => request('description'),
            'url' => request('url'),
            'domain' => request('domain'), 
            'project_file' => $file,
            'profile_id' => Auth::user()->profile->id,
            'permission' => request('permission')
        ]);
        //dd($validate);
        return back()->with('success', 'Successfully Submitted Project! Waiting for Approval.. keep patience');
    }

    function create(){
        return view('projects.create');
    }

    function myprojects(){
        $projects = Project::where('profile_id','=', Auth::user()->profile->id)->paginate(5);

        return view('projects.myprojects', ['projects'=>$projects]);
    }
    function filterCategory($name){

        $projects =  Project::where('approval','=','Y')->where('permission','=', 'public')->where('domain','=',$name)->paginate(12);
        return view('projects.index', ['projects'=>$projects]);
    }
    function download($name){
        return Storage::download($name);
    }
    function destroy(Request $request, $id){
        $project = Project::find($id);
        Storage::delete($project->project_file);
        $project->delete();

        return back()->with('success', 'Sucesssfully deleted');
    }
}
