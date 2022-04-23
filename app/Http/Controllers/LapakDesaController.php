<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use App\Models\IdentitasDesa;
use App\Models\LapakDesa;
use App\Models\PemerintahDesa;
use Illuminate\Http\Request;

class LapakDesaController extends Controller
{
    public function index(){
        $lapaks = LapakDesa::all();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('lapak-desa.lapak-desa', compact('lapaks', 'identitas', 'pemerintahan', 'aparaturs'));
    }

    public function show(LapakDesa $lapak){
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('lapak-desa.detail-lapak', compact('lapak', 'identitas', 'pemerintahan', 'aparaturs'));
    }   
}
