<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isOrganizer(): bool
    {
        if (!$this->role) {
            return false;
        }

        return strtolower($this->role->name) === 'organizer';
    }

    // Alias for controller method $user->events()
    public function events()
    {
        return $this->organizedEvents();
    }

    // Events organized by this user
    public function organizedEvents()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    // Events the user registered for as a participant
    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user')
            ->withPivot('status', 'registered_at')
            ->withTimestamps();
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}