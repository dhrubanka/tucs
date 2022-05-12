<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function store(Request $request){

        $validatedData = $request->validate([
            'schoolName' => 'required',
            'courseName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'profile_id' => 'required',
        ]);

        Education::create([
            'schoolName' => request('schoolName'),
            'courseName' => request('courseName'),
            'startDate' => request('startDate'),
            'endDate' => request('endDate'),
            'description' => request('description'),
            'profile_id' => Auth::user()->profile->id,
        ]);

       return back();
    }
}
