<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscriber\SubscriberStoreRequest;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{

    /**
     * Display a listing of the subscribers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all subscribers details
        $subscribers = Subscriber::latest()->get();

        // Return to index page
        return view("admin.subscriber.index", compact('subscribers'));
    }

    /**
     * Store a newly created subscriber in storage.
     *
     * @param  SubscriberStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriberStoreRequest $request)
    {
        // Store subscriber details
        Subscriber::create($request->input());

        // Make success response
        Toastr::success(
            'Thank you ! You are added to our subscriber list. We will send you futher notification.',
            'Success'
        );

        // Return to back
        return redirect()->back();
    }

    /**
     * Remove the specified subscriber from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        // Delete subscriber details
        $subscriber->delete();

        // Make success response
        Toastr::success('Your Subscriber Successfully Deleted.', 'Success');

        // Return to back
        return redirect()->back();
    }
}
