<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\Forum;
use App\Models\Post;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Like;
use App\Models\Dislike;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $communities = Community::take(3)->get();

        $blog = Blog::take(2)->get();
        
        $event = Event::query()
        ->orderBy('start_date_time')
        ->take(2)
        ->get();

        $upcomingEventCount = Event::query()
        ->where('start_date_time', '>=', Carbon::today())
        ->count();

        $pastEventCount = Event::query()
        ->where('start_date_time', '<', Carbon::today())
        ->count();

        if(Auth::check()){ 
            $posts = Post::query()
            ->join('subscriptions', function ($join) {
                $join->on('posts.community_id', '=', 'subscriptions.community_id')
                ->where('subscriptions.profile_id', '=', Auth::user()->profile->id);
            })
            ->take(2)
            ->get();
        }
        else{
            $posts= Post::take(2)->get();
        }
        return view('home', ['posts' => $posts, 'communities' => $communities, 'blogs' => $blog, 'events' => $event, 'upcomingEventCount' => $upcomingEventCount, 'pastEventCount' => $pastEventCount]);
   }
   public function admin()
    {
        return view('admin.dashboard');
    }
}
