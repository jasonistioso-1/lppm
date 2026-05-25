<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'email',
        'phone',
        'whatsapp',
        'service_hours',
        'google_maps_embed',
    ];
}
