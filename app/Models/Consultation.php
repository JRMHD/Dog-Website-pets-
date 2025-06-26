<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'dog_age',
        'preferred_date',
        'preferred_time',
        'service',
        'message',
        'quiz_answer',
        'status'
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'preferred_time' => 'datetime',
    ];

    // Accessor for formatted date
    public function getFormattedDateAttribute()
    {
        return $this->preferred_date->format('F j, Y');
    }

    // Accessor for formatted time
    public function getFormattedTimeAttribute()
    {
        return $this->preferred_time->format('g:i A');
    }

    // Accessor for service name
    public function getServiceNameAttribute()
    {
        $services = [
            'breeding' => 'Quality Dog Breeding - Puppy Purchase',
            'training' => 'Dog Training (All Ages)',
            'walking' => 'Professional Dog Walking',
            'consultation' => 'Breeding Consultation',
            'multiple' => 'Multiple Services'
        ];

        return $services[$this->service] ?? $this->service;
    }

    // Accessor for dog age display
    public function getDogAgeDisplayAttribute()
    {
        $ages = [
            'puppy' => 'Puppy (0-6 months)',
            'young' => 'Young (6 months - 2 years)',
            'adult' => 'Adult (2-7 years)',
            'senior' => 'Senior (7+ years)',
            'looking' => 'Looking for a puppy'
        ];

        return $ages[$this->dog_age] ?? 'Not specified';
    }
}
