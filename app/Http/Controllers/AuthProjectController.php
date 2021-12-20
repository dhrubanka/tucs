<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('admin.projects.index', ['projects' => $projects]);
    }

    public function approve($id){
        $project = Project::find($id);

        $project->update([
        'approval' => 'Y'
        ]);

        return redirect()->back();
        
    }
    public function reject($id){
        $project = Project::find($id);

        $project->update([
        'approval' => 'R',
        'remark'=> 'Guidelines Violations'
        ]);

        return redirect()->back();
        
    }
}
