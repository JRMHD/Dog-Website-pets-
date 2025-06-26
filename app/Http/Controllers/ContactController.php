<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate input including bot quiz (2+3)
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'emailaddress' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'msg' => 'required|string',
            'quiz_answer' => 'required|numeric|in:5',
        ]);

        // Save to database
        $contact = Contact::create($request->only([
            'fullname',
            'phone',
            'emailaddress',
            'subject',
            'msg'
        ]));

        // Send email to admin using Mailable
        Mail::to('gibmarnel@gmail.com')->send(new ContactFormMail($contact));

        // Return success JSON (for AJAX response)
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully.'
        ]);
    }
}
