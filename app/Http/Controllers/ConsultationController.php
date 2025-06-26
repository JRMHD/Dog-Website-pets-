<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use App\Mail\ConsultationConfirmation;
use App\Mail\ConsultationNotification;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ConsultationController extends Controller
{
    /**
     * Display the consultation form.
     */
    public function index()
    {
        return view('consultation');
    }

    /**
     * Store a newly created consultation in storage.
     */
    public function store(ConsultationRequest $request)
    {
        try {
            // Create consultation record
            $consultation = Consultation::create([
                'name' => $request->fname,
                'phone' => $request->phone,
                'email' => $request->email,
                'dog_age' => $request->dog_age,
                'preferred_date' => $request->date,
                'preferred_time' => $request->time,
                'service' => $request->service,
                'message' => $request->message,
                'quiz_answer' => $request->quiz_answer,
                'status' => 'pending'
            ]);

            // Send notification email to Gibmarnel
            try {
                Mail::to('gibmarnel@gmail.com')->send(
                    new ConsultationNotification($consultation)
                );
            } catch (\Exception $e) {
                Log::error('Failed to send notification email: ' . $e->getMessage());
            }

            // Send confirmation email to user
            try {
                Mail::to($consultation->email)->send(
                    new ConsultationConfirmation($consultation)
                );
            } catch (\Exception $e) {
                Log::error('Failed to send confirmation email: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Your consultation has been booked successfully!',
                'consultation_id' => $consultation->id
            ]);
        } catch (\Exception $e) {
            Log::error('Consultation booking failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error booking your consultation. Please try again or contact us directly.'
            ], 500);
        }
    }

    /**
     * Get a random quiz question for bot protection.
     */
    public function getQuizQuestion()
    {
        $questions = [
            [
                'question' => 'What is a young dog called?',
                'answers' => ['puppy', 'dog', 'canine']
            ],
            [
                'question' => 'What animal is known as man\'s best friend?',
                'answers' => ['dog', 'puppy', 'canine']
            ],
            [
                'question' => 'What is another word for dog?',
                'answers' => ['canine', 'dog', 'puppy']
            ]
        ];

        $randomQuestion = $questions[array_rand($questions)];

        return response()->json($randomQuestion);
    }
}
