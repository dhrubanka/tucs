<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'companyName' => 'required',
            'designation' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'profile_id' => 'required',
        ]);

        Work::create([
            'companyName' => request('companyName'),
            'designation' => request('designation'),
            'startDate' => request('startDate'),
            'endDate' => request('endDate'),
            'description' => request('description'),
            'profile_id' => request('profile_id'),
        ]);

       return back();
    }

    public function delete(Request $request, $id)
    {
        $work = Work::find($id)->delete();
        return back();
    }

}
