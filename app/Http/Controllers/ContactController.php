<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FeedbackMessage;
use Mail;
use Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactData = $request->validate([
            'message' => 'required|max:1024'
        ]);
        
        Mail::to('danielgestwa@gmail.com')->send(
            new FeedbackMessage(
                Auth::user()->email,
                $contactData['message']
            )
        );

        return view('contact.index')->with('successMsg','Thank you for your feedback! E-mail has been sent!');
    }
}
