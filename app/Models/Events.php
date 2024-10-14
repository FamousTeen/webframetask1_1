<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Events extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'title',        
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizer_id',
    ];

    public function event_category(): BelongsTo
    {
       return $this->belongsTo(Event_Categories::class, 'event_category_id');
    }

    public function organizer(): BelongsTo {
        return $this->belongsTo(Organizers::class, 'organizer_id');
    }

    public function tags(): HasMany {
        return $this->hasMany(Tags::class);
    }

}
