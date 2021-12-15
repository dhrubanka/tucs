<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function index(){
        return view('events.index');
    }

    function show(){
        return view('events.show');
    }

}
