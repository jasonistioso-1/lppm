<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'name',
        'nidn',
        'department',
        'expertise',
        'photo',
        'email',
        'google_scholar',
        'sinta',
        'scopus',
        'status',
    ];

    protected $appends = ['nama', 'prodi', 'gsUser', 'keahlian'];

    // Accessors for front-end JS compatibility with older script versions
    public function getNamaAttribute()
    {
        return $this->name;
    }

    public function getProdiAttribute()
    {
        return $this->department;
    }

    public function getGsUserAttribute()
    {
        return $this->google_scholar;
    }

    public function getKeahlianAttribute()
    {
        return $this->expertise;
    }
}
