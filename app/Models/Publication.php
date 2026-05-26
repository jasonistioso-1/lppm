<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'author',
        'journal_name',
        'year',
        'link',
        'file',
        'status',
    ];

    protected $appends = ['authors', 'url', 'file_path', 'cover', 'indexing_badge'];

    public function getAuthorsAttribute()
    {
        return $this->author;
    }

    public function getUrlAttribute()
    {
        return $this->link;
    }

    public function getFilePathAttribute()
    {
        return $this->file;
    }

    public function getCoverAttribute()
    {
        $title = strtolower($this->title);
        if (strpos($title, 'akuntansi') !== false || strpos($title, 'accounting') !== false || strpos($title, 'finance') !== false) {
            return 'assets/images/jurnal/jurnal-akuntansi.jpg';
        }
        if (strpos($title, 'manajemen') !== false || strpos($title, 'management') !== false) {
            return 'assets/images/jurnal/jurnal-manajemen.jpg';
        }
        if (strpos($title, 'abdimas') !== false || strpos($title, 'pengabdian') !== false || strpos($title, 'community') !== false) {
            return 'assets/images/jurnal/jurnal-abdimas.png';
        }
        if (strpos($title, 'komunikasi') !== false || strpos($title, 'communication') !== false) {
            return 'assets/images/jurnal/jurnal-komunikasi-bisnis.png';
        }
        if (strpos($title, 'ekonomi') !== false || strpos($title, 'perusahaan') !== false || strpos($title, 'business') !== false) {
            return 'assets/images/jurnal/jurnal-ekonomi-perusahaan.jpg';
        }
        if (strpos($title, 'informatika') !== false || strpos($title, 'sistem') !== false || strpos($title, 'information') !== false || strpos($title, 'computer') !== false) {
            return 'assets/images/jurnal/jurnal-informatika-bisnis.jpg';
        }
        return 'assets/images/jurnal/jurnal-manajemen.jpg';
    }

    public function getIndexingBadgeAttribute()
    {
        $id = $this->id % 4;
        if ($id === 0) return 'assets/images/index/sinta-3.png';
        if ($id === 1) return 'assets/images/index/sinta-4.png';
        if ($id === 2) return 'assets/images/index/google-scholar.png';
        return 'assets/images/index/crossreff.png';
    }
}
