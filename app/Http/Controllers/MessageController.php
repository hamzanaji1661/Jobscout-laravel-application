<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $message = new Message();
        $message->message = $request->message;
        $message->save();
        return response()->json([
            'message' => 'Great success! New message created',
            'message_id' => $message->id
        ]);
    }
    //
}
