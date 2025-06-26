<?php


namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSubscriptionMail;
use App\Mail\SubscriberThankYouMail;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $sub = Subscription::create(['email' => $request->email]);

        Mail::to('reaganmukabana@gmail.com')->send(new NewSubscriptionMail($sub));
        Mail::to($sub->email)->send(new SubscriberThankYouMail($sub));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing!'
        ]);
    }
}
