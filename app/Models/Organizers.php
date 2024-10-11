<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizers extends Model
{
    use HasFactory;
    public function events()
    {
        return $this->hasMany(Events::class);
    }

    protected $fillable = [
        'name',
        'description',
        'facebook_link',
        'x_link',
        'website_link',
        'active',
    ];
}
