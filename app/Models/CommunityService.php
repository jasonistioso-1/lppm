<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
    use HasFactory;

    protected $table = 'community_services';

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

    protected $appends = ['leader', 'service_status', 'proposal_file', 'report_file'];

    public function getLeaderAttribute()
    {
        return $this->lecturer_name;
    }

    public function getServiceStatusAttribute()
    {
        return $this->status === 'published' ? 'Selesai' : 'Draft';
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
