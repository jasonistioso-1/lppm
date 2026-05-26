<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\News;
use App\Models\Video;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Agenda;
use App\Models\Research;
use App\Models\CommunityService;
use App\Models\Publication;
use App\Models\Document;

class DashboardController extends Controller
{
    public function index()
    {
        $dosenCount = Lecturer::count();
        $beritaCount = News::count();
        $videoCount = Video::count();
        $sliderCount = Slider::count();
        $galleryCount = Gallery::count();
        $agendaCount = Agenda::count();
        $penelitianCount = Research::count();
        $abdimasCount = CommunityService::count();
        $publikasiCount = Publication::count();
        $dokumenCount = Document::count();

        return view('admin.dashboard', compact(
            'dosenCount',
            'beritaCount',
            'videoCount',
            'sliderCount',
            'galleryCount',
            'agendaCount',
            'penelitianCount',
            'abdimasCount',
            'publikasiCount',
            'dokumenCount'
        ));
    }
}
