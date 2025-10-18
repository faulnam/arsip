<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'event_id', 
        'title', 
        'description', 
        'material',
        'documentation', 
        'video_embed', 
        'report_file'
    ];

    protected $casts = [
        'documentation' => 'array', // Jika menyimpan multiple images sebagai JSON
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
