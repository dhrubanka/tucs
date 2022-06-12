<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{

    function index(Request $request)
    {
        $id = Auth::user()->profile->id;

        $message = DB::table('conversations')
            ->join('profiles as sp', function ($join) {
                $join->on('conversations.user1', '=', 'sp.id');
            })
            ->join('users as su', function ($join) {
                $join->on('su.id', '=', 'sp.user_id');
            })
            ->join('profiles as rp', function ($join3) {
                $join3->on('conversations.user2', '=', 'rp.id');
            })
            ->join('users as ru', function ($join) {
                $join->on('ru.id', '=', 'rp.user_id');
            })
            // ->join('messages', function ($join) {
            //     $join->on('messages.conversation_id', '=', 'conversations.id')
            //         // ->orderByDesc('messages.updated_at')
            //         ->limit(1);
            // })
            ->select('conversations.id as convoID', 'sp.firstName as sender', 'rp.firstName as receiver', 
            'sp.id as senderId', 'rp.id as receiverId', 
            'su.id as suID', 'ru.id as ruID')
            ->where('conversations.user1', '=', $id)
            ->orWhere('conversations.user2', '=', $id)
            // ->where('messages.sender_id','!=', 'messages.receiver_id')
            ->get();

        // dd($message);
        // dd($message);
        return view('message.index',['messages'=>$message]);
    }

    function view(Request $request,$id)
    {

        $message = DB::table('conversations')
            ->join('messages', function ($join) {
                $join->on('messages.conversation_id', '=', 'conversations.id');
            })
            ->join('profiles as sp', function ($join) {
                $join->on('conversations.user1', '=', 'sp.id');
            })
            ->join('users as su', function ($join) {
                $join->on('su.id', '=', 'sp.user_id');
            })
            ->join('profiles as rp', function ($join3) {
                $join3->on('conversations.user2', '=', 'rp.id');
            })
            ->join('users as ru', function ($join) {
                $join->on('ru.id', '=', 'rp.user_id');
            })
            ->select('sp.firstName as sender', 'rp.firstName as receiver', 'sp.id as senderID', 'rp.id as receiverID', 'su.id as suID', 'ru.id as ruID', 'messages.content', 'messages.sender_id as msgSender', 'messages.created_at')
            ->where('conversations.id', '=', $id)
            // ->where('messages.sender_id', '=', Auth::user()->profile->id)
            // ->orWhere(function ($query) use ($id) {
            //     $query->where('messages.sender_id', '=', $id)
            //         ->where('messages.receiver_id', '=', Auth::user()->profile->id);
            // })
            ->orderBy('messages.created_at', 'desc')
            // ->where('messages.sender_id','!=', 'messages.receiver_id')
            ->paginate(6);
        
            // if($request->has('page')) {
            //     Paginator::currentPageResolver(fn() => $message->lastPage());
                
            // }
  
         //dd($message);
        $latestMsg = DB::table('messages')
        ->where('messages.conversation_id', $id)
        ->orderBy('updated_at', 'desc')
        ->first();

        //dd($latestMsg);

        if($latestMsg->sender_id != Auth::user()->profile->id){
            $conv = Conversation::find($id);
            $conv->update([
                'seen' => 0
            ]);    
        }

        return view('message.view', ['messages' => $message]);
    }
}
