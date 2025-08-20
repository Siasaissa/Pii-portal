<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\BrandedEmail;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function sendPasswordResetNotification($token)
    {
        // Build the reset password URL
        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $this->email
        ], false));

        // Send our custom HTML email
        Mail::to($this->email)->send(new BrandedEmail(
            greeting: 'Hello ' . $this->name . '!',
            introLines: [
                'We received a request to reset your password.',
                'This password reset link will expire in 60 minutes.'
            ],
            actionText: 'Reset Password',
            actionUrl: $resetUrl,
            outroLines: [
                'If you did not request a password reset, no further action is required.'
            ],
            salutation: 'Regards, ' . config('app.name')
        ));
    }
}