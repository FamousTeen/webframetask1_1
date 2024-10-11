<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizer_id',
        'category_id',
        'active',
    ];

    // Define the relationship with Organizer
    public function organizer()
    {
        return $this->belongsTo(Organizers::class, 'organizer_id');
    }
}
