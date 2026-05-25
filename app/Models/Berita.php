<?php

namespace App\Models;

class Berita extends News
{
    // Accessors to maintain backward compatibility with old Berita model
    public function getDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('Y-m-d') : $this->created_at->format('Y-m-d');
    }

    public function getImageAttribute()
    {
        return $this->thumbnail;
    }

    public function getLinkAttribute()
    {
        return route('home'); // Dynamic fallback or default
    }
}
