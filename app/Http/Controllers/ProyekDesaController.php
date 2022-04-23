<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use App\Models\IdentitasDesa;
use App\Models\LapakDesa;
use App\Models\PemerintahDesa;
use App\Models\ProyekDesa;
use Illuminate\Http\Request;

class ProyekDesaController extends Controller
{
    public function index(){
        $proyeks = ProyekDesa::all();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('proyek-desa.proyek-desa', compact('proyeks', 'identitas', 'pemerintahan', 'aparaturs'));
    }

    public function show(ProyekDesa $proyek){
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('proyek-desa.detail-proyek', compact('proyek', 'identitas', 'pemerintahan', 'aparaturs'));
}
}
