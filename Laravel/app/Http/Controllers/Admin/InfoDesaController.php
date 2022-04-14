<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoDesaController extends Controller
{
    public function identitasDesa(){
        return view('admin.info-desa.identitas-desa');
    }

    public function pemerintahanDesa(){
        return view('admin.info-desa.pemerintahan-desa');
    }
}
