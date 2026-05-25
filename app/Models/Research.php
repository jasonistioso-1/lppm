<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';

    protected $fillable = [
        'title',
        'slug',
        'scheme',
        'lecturer_name',
        'year',
        'abstract',
        'document',
        'status',
    ];

    protected $appends = ['leader', 'research_status', 'output_type', 'proposal_file', 'report_file'];

    public function getLeaderAttribute()
    {
        return $this->lecturer_name;
    }

    public function getResearchStatusAttribute()
    {
        return $this->status === 'published' ? 'Selesai' : 'Draft';
    }

    public function getOutputTypeAttribute()
    {
        return $this->scheme;
    }

    public function getProposalFileAttribute()
    {
        return $this->document;
    }

    public function getReportFileAttribute()
    {
        return $this->document;
    }
}
