<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'date_start', 'date_end',
        'location', 'organizer', 'speaker', 'poster', 'status'
    ];

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
