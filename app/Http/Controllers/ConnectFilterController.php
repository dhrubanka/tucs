<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectFilterController extends Controller
{   //student offers filtrs
    public function offersfilter(Request $request){

        $offers = Offer::orderBy('id', request('order'))->paginate(10);

        return view('connect.notice.index', [ 'offers' => $offers ]); 
    }

    public function myapplicationfilter(Request $request){

        $applied = Applicant::orderBy('id', request('order'))->where('profile_id','=', Auth::user()->profile->id)->paginate(12);
 
        return view('connect.notice.offers.studentpane.myapplications', ['jobs' => $applied]); 
    }
    //alumni offer filters
    public function myofferfilter(Request $request){

        $offers = Offer::orderBy('id', request('order'))->where('user_id','=', Auth::user()->id)->paginate(10);
        //dd($offers);
        return view('connect.notice.offers.alumnipane.myoffers', ['offers' => $offers]);
    }

    public function applicantfilter(Request $request){
        $applicants = Applicant::orderBy('id',  request('order'))->where('offer_id','=',  request('offer_id'))->with('profile')->paginate(10);
        //dd($applicants[0]->profile->firstName);
        return view('connect.notice.offers.alumnipane.applicants',['applicants'=>$applicants]);
    }

}
