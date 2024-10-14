<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event_Categories extends Model
{
    use HasFactory;

    protected $table = 'event_categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name'
    ];

    public function events(): HasMany {
        return $this->hasMany(Events::class);
    }
}
