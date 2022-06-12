<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class ConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // job functions of alumni starts here

    public function index()
    {
        $offers = Offer::orderBy('id', 'DESC')->paginate(10);
        //dd($offers);
        return view('connect.notice.index', [ 'offers' => $offers ]);
    }

    public function jobDetails($id){
        $offer = Offer::find($id);
        return view('connect.notice.post' , ['offer'=>$offer]);
    }

    public function jobCreate(){
        return view('connect.notice.offers.alumnipane.create');
    }

    public function jobStore(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        Offer::create([
            'title' => request('title'), 
            'user_id' => Auth::user()->id, 
            'category' => request('category'),
            'description' => request('description')
        ]);

        return back()->with('success', 'Successfully inserted a new Offer!'); 
    }
    public function myoffers(){
        
        $offers = Offer::where('user_id','=', Auth::user()->id)->paginate(10);
        //dd($offers);
        return view('connect.notice.offers.alumnipane.myoffers', ['offers' => $offers]);
    }

    public function markInactive($id){
        $offer = Offer::find($id);
        $offer->update([
            'status' => 'N'
        ]);
        return back()->with('success', "Marked Inactive");
    }

    

    // job functions of alumni ends here

    // data gathering for profiles


    public function student()
    {
         
        $students = User::with('roles')->role('student')->with('profile')->paginate(12);
        //dd($students);
        // $projectsCount = count($students[3]->profile->projects);
        // dd($projectsCount);
        return view('connect.student', [  'students' => $students]);
    }

    public function alumni()
    {
        $alumnis = User::with('roles')->role('alumni')->with('profile')->paginate(12); 
        //dd($students);
        return view('connect.alumni', ['alumnis' => $alumnis ]);
    }

    public function professor()
    {
        $professors = User::with('roles')->role('professor')->with('profile')->paginate(12);
      
        //dd($students);
        return view('connect.professor', [ 'professors' => $professors ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function show(Connect $connect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function edit(Connect $connect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Connect $connect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Connect  $connect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Connect $connect)
    {
        //
    }
}
