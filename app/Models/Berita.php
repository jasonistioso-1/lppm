<?php

namespace App\Models;

use Illuminate\Support\Str;

class Berita extends News
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'thumbnail',
        'content',
        'status',
        'published_at',
        // compatibility fields
        'date',
        'image',
        'link',
    ];

    public function setDateAttribute($value)
    {
        $this->attributes['published_at'] = $value ? date('Y-m-d H:i:s', strtotime($value)) : now();
    }

    public function setImageAttribute($value)
    {
        $this->attributes['thumbnail'] = $value;
    }

    // Automatically set slug on title assignment
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->title);
            }
        });
    }
}
