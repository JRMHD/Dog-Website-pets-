<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $temporaryPassword;
    public string $resetLink;

    public function __construct(User $user, string $temporaryPassword)
    {
        $this->user = $user;
        $this->temporaryPassword = $temporaryPassword;
        $this->resetLink = URL::temporarySignedRoute(
            'password.reset',
            Carbon::now()->addMinutes(60),
            ['token' => app('auth.password.broker')->createToken($user)]
        );
    }

    public function build()
    {
        return $this->subject('Welcome to Our Platform - Temporary Login Info')
            ->view('emails.user_created');
    }
}
