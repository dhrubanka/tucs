<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewApplicants($id){
        $applicants = Applicant::orderBy('id', 'DESC')->where('offer_id','=', $id)->with('profile')->paginate(10);
        //dd($applicants[0]->profile->firstName);
        return view('connect.notice.offers.alumnipane.applicants',['applicants'=>$applicants,'offer_id' => $id]);
    }

    public function myApp()
    {
        $applied = Applicant::orderBy('id', 'DESC')->where('profile_id','=', Auth::user()->profile->id)->paginate(12);

        return view('connect.notice.offers.studentpane.myapplications', ['jobs' => $applied]);
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
        // dd($request['offer_id']);
        if(Applicant::where('offer_id','=', request('offer_id'))->where('profile_id','=', Auth::user()->profile->id)->first()){
            return back()->with('success', 'Already Applied!');
        }else{
        $validatedData = $request->validate([
            'offer_id' => 'required'
        ]);

        Applicant::create([
            'offer_id' => request('offer_id'), 
            'profile_id' => Auth::user()->profile->id,  
        ]);

        return back()->with('success', 'Successfully Applied!');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant, $id)
    {
        $application = Applicant::find($id);

        $application->delete();

        return  back()->with('success', 'Application Revoked!');
    }
}
