<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    function index($id)
    {
        // $message = Message::query()
        // ->join('profiles', function ($join) {
        //     $join->on('profiles.id', '=', 'messages.sender_id')
        //     ->join('users', function ($join2) {
        //         $join2->on('profiles.user_id', '=', 'users.id');
        //     });
        // })
        // ->where('messages.receiver_id', $id)
        // ->orderby('messages.created_at','desc')
        // ->get();

        $message = DB::table('messages')
            ->join('profiles as sp', function ($join) {
                $join->on('messages.sender_id', '=', 'sp.id');
            })
            // ->join('users as su', function ($join2) {
            //     $join2->on('sp.user_id', '=', 'su.id');
            // })
            ->join('profiles as rp', function ($join3) {
                $join3->on('messages.receiver_id', '=', 'rp.id');
            })
            // ->join('users as ru', function ($join4) {
            //     $join4->on('rp.user_id', '=', 'ru.id');
            // })
            ->select('sp.firstName as sender', 'rp.firstName as receiver', 'sp.id as senderId', 'rp.id as receiverId', 'messages.content')
            ->where('messages.receiver_id', '=', $id)
            ->orWhere('messages.sender_id', '=', $id)
            // ->where('messages.sender_id','!=', 'messages.receiver_id')
            ->get();

        // dd($message);

        return view('message.index', ['messages' => $message]);
    }

    function view($id)
    {

        $message = DB::table('messages')
            ->join('profiles as sp', function ($join) {
                $join->on('messages.sender_id', '=', 'sp.id');
            })
            ->join('users as su', function ($join2) {
                $join2->on('sp.user_id', '=', 'su.id');
            })
            ->join('profiles as rp', function ($join3) {
                $join3->on('messages.receiver_id', '=', 'rp.id');
            })
            ->join('users as ru', function ($join4) {
                $join4->on('rp.user_id', '=', 'ru.id');
            })
            ->select('su.name as sender', 'ru.name as receiver', 'messages.content')
            ->where('messages.receiver_id', '=', $id)
            ->where('messages.sender_id', '=', Auth::user()->profile->id)
            ->orWhere(function ($query) use ($id) {
                $query->where('messages.sender_id', '=', $id)
                    ->where('messages.receiver_id', '=', Auth::user()->profile->id);
            })
            ->orderBy('messages.created_at')
            // ->where('messages.sender_id','!=', 'messages.receiver_id')
            ->get();

        $person = DB::table('users')
            ->join('profiles', function ($join) {
                $join->on('users.id', '=', 'profiles.user_id');
            })
            ->where('profiles.id', $id)
            ->first();

        // dd($person);

        return view('message.view', ['messages' => $message, 'person' => $person]);
    }




    function create($id)
    {
        $user = Profile::query()
            // ->where('id', '!=', $id)
            // ->get();
            ->whereNotIn('id', function ($query) use ($id) {
                $query->select('profiles.id')
                    ->from('profiles')
                    ->where('profiles.id', '=', $id);
            })->get();
        // dd($user);
        return view('message.create', ['users' => $user]);
    }

    function store(Request $request, $id)
    {

        $validatedData = $request->validate([
            'content' => 'required|string|max:255'
        ]);



        $conversation = Conversation::query()
            ->where('conversations.user1', $id)
            ->where('conversations.user2', request('receiver_id'))
            ->orWhere(function ($query) use ($id) {
                $query->where('conversations.user1', request('receiver_id'))
                    ->where('conversations.user2', $id);
            })
            ->first();

        if ($conversation == null) {
            $conversation = Conversation::create([
                'user2' => request('receiver_id'),
                'user1' => $id,
            ]);
        }

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $id,
            'content' => request('content'),
        ]);

        return back()->with('success', 'Successfully Sent message');
    }
}
