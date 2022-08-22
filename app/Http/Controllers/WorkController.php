<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Validator;

class WorkController extends Controller
{
    public function store(Request $request){
        $current = 0;
        if(request('current') == 'on')
            $current= 1;
        //dd(request('current'));
        $required = '';
        if(!$current)
            $required = 'required';

        $validated = $request->validate([
            'companyName' => 'required',
            'designation' => 'required',
            'startDate' => 'required',
            'endDate' => $required,
            'profile_id' => 'required',
        ]);
      
        // print(request('current'));
        Work::create([
            'companyName' => request('companyName'),
            'designation' => request('designation'),
            'startDate' => request('startDate'),
            'current' => $current,
            'endDate' => request('endDate'),
            'description' => request('description'),
            'profile_id' => request('profile_id'),
        ]);

      dd($validated);
       return back();
    }

    public function delete(Request $request, $id)
    {
        $work = Work::find($id)->delete();
        return back();
    }

}
