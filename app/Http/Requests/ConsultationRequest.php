<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|string|max:255|min:2',
            'phone' => 'required|string|max:20|regex:/^[\+]?[0-9\s\-\(\)]+$/',
            'email' => 'required|email|max:255',
            'dog_age' => 'nullable|string|in:puppy,young,adult,senior,looking',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'service' => 'required|string|in:breeding,training,walking,consultation,multiple',
            'message' => 'nullable|string|max:1000',
            'quiz_answer' => 'required|string|in:dog,puppy,canine'
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'fname.required' => 'Please enter your name.',
            'fname.min' => 'Name must be at least 2 characters long.',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'Please enter a valid phone number.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'date.required' => 'Please select a preferred date.',
            'date.after_or_equal' => 'Please select a date from today onwards.',
            'time.required' => 'Please select a preferred time.',
            'time.date_format' => 'Please select a valid time.',
            'service.required' => 'Please select a service.',
            'service.in' => 'Please select a valid service option.',
            'quiz_answer.required' => 'Please answer the verification question.',
            'quiz_answer.in' => 'Incorrect answer to the verification question. Please try again.'
        ];
    }

    /**
     * Get custom attribute names for error messages.
     */
    public function attributes(): array
    {
        return [
            'fname' => 'name',
            'date' => 'preferred date',
            'time' => 'preferred time',
            'quiz_answer' => 'verification answer'
        ];
    }
}
