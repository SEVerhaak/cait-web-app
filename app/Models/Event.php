<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'max_people',
        'price',
        'location',
        'is_public',
        'requires_verification',
        'image_path',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_public' => 'boolean',
        'requires_verification' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Users that belong to the event (sign-ups).
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status', 'signed_up_at')
            ->withTimestamps();
    }

    /**
     * Check if the event is full.
     */
    public function isFull(): bool
    {
        if (is_null($this->max_people)) {
            return false;
        }
        return $this->users()->count() >= $this->max_people;
    }

    /**
     * Scope for upcoming events only.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>=', now())->orderBy('start_time', 'asc');
    }
}
