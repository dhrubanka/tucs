<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function index(){
        $event = Event::all();
        return view('events.index', ['events' => $event]);
    }

    function list(){
        $event = Event::all();
        return view('admin.events.list', ['events' => $event]);
    }

    function listView($id){
        $event = Event::where('id','=',$id)->first();
        return view('admin.events.listView', ['event' => $event]);
    }

    function show($id){
        $event = Event::where('id','=',$id)->first();
        return view('events.show', ['event' => $event]);
    }

    function create(){
        return view('admin.events.create');
    }

    function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date_time' => 'required',
            'end_date_time' => 'required',
            'organizer' => 'required',
            'mode' => 'required',
            'venue' => 'nullable',
            'link' => 'nullable',
        ]);

        Event::create([
            'title' => request('title'),
            'description' => request('description'),
            'start_date_time' => request('start_date_time'),
            'end_date_time' => request('end_date_time'),
            'organizer' => request('organizer'),
            'mode' => request('mode'),
            'venue' => request('venue'),
            'link' => request('link'),
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Successfully inserted a new event!');
    }

}
