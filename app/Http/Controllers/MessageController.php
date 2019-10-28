<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function fetch()
    {
        return Message::with('user')->get();
    }
    public function sent()
    {
        $user=Auth::user();
        $message=$user->messages()->create([
            'message' => request()->message
        ]);
        broadcast(new MessageSentEvent($user,$message));
    }
}
