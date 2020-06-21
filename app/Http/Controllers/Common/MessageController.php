<?php

namespace App\Http\Controllers\Common;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\MessageRequest;
use App\Http\Requests\Message\ReplyRequest;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;

class MessageController extends Controller
{
    /**
     * Display a listing of the message.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the messages
        $messages = Message::latest()->get();

        // Return to index page
        return view("admin.message.inbox", compact('messages'));
    }


    /**
     * Display a listing of the read message.
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        // Get all the unread messages
        $messages = Message::read(true);

        // Return to index page
        return view("admin.message.inbox", compact('messages'));
    }


    /**
     * Display a listing of the unread message.
     *
     * @return \Illuminate\Http\Response
     */
    public function unread()
    {
        // Get all the unread messages
        $messages = Message::read(false);

        // Return to index page
        return view("admin.message.inbox", compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Message\MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        // Store requested message details
        $message = Message::create($request->all());

        // Send notification to admin
        NotificationHelper::notify('admin', $message, 'message', 'new');

        // Make success response
        Toastr::success('Thank you for contacting us ! We will consider your report soon.', 'Success');

        // Return to back
        return redirect()->back();
    }

    /**
     * Replay a message by admin to reporter.
     *
     * @param  \App\Http\Requests\Message\ReplyRequest  $request
     * @param \App\Models\Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(ReplyRequest $request, Message $message)
    {
        // Update the message details for reply
        $message->is_replied = true;
        $message->save();
        $message->reply = $request->reply;

        // Send notification to reporter
        NotificationHelper::notify('reporter', $message, 'message');

        // Make success response
        Toastr::success('Message replied successfully !', 'Success');

        // Return to back
        return redirect()->back();
    }


    /**
     * Remove the specified message from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        // Delete message details
        $message->delete();

        // Make success response
        Toastr::success('Message Successfully Deleted.', 'Success');

        // Return to back
        return redirect()->back();
    }
}
