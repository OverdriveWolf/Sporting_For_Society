<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'category_id',
        'title',
        'description',
        'location',
        'event_date',
        'max_participants',
    ];

    /**
     * Cast attributes to native types.
     */
    protected $casts = [
        'event_date' => 'datetime',
        'max_participants ' => 'integer',
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status', 'registered_at')
            ->withTimestamps();
    }
    public function isFull(): bool
    {
        if (!$this->max_participants) {
            return false;
        }

        return $this->participants()->count() >= (int) $this->max_participants;
    }
}