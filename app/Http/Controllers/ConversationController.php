<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Auth::user()->sent()->create([
            'body'       => $request['message'],
            'sent_to_id' => $request['sent_to_id'],
        ]);

        return redirect()->route('users.show',$request['sent_to_id']);

    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
        $message->delete();

        return redirect()->back();
    }

    public function show() {
        $messages = DB::table('messages')
            ->join('users', function ($join) {
                $join->on('messages.sender_id', '=', 'users.id')
                 ->where('sent_to_id', '=', Auth::id());
            })
            ->get();

        return view('messages', compact('messages'));
    }
}
