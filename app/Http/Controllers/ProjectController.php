<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index(){
        return view('projects.index');
    }

    function show(){
        return view('projects.show');
    }

    function create(){
        return view('projects.create');
    }
}
