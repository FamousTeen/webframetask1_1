<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organizers extends Model
{
    use HasFactory;

    protected $primaryKey = 'organizer_id';

    protected $fillable = [
        'name',
        'facebook_link',
        'x_link',
        'website_link',
        'description'
    ];

    public function events(): HasMany {
        return $this->hasMany(Events::class);
    }
}
