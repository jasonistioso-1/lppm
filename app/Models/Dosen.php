<?php

namespace App\Models;

class Dosen extends Lecturer
{
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
        // compatibility fields
        'nama',
        'prodi',
        'gsUser',
        'keahlian',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function setProdiAttribute($value)
    {
        $this->attributes['department'] = $value;
    }

    public function setGsUserAttribute($value)
    {
        $this->attributes['google_scholar'] = $value;
    }

    public function setKeahlianAttribute($value)
    {
        $this->attributes['expertise'] = $value;
    }
}
