<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    private function getDosenView($viewName)
    {
        $dosens = Dosen::where('status', 'active')->get();
        return view($viewName, compact('dosens'));
    }

    public function akuntansi()
    {
        return $this->getDosenView('dosen.akuntansi');
    }

    public function manajemen()
    {
        return $this->getDosenView('dosen.manajemen');
    }

    public function ilmuKomunikasi()
    {
        return $this->getDosenView('dosen.ilmukomunikasi');
    }

    public function ilmuAdministrasiBisnis()
    {
        return $this->getDosenView('dosen.ilmuadministrasibisnis');
    }

    public function sistemInformasi()
    {
        return $this->getDosenView('dosen.sisteminformasi');
    }

    public function teknikInformatika()
    {
        return $this->getDosenView('dosen.teknikinformatika');
    }
}
