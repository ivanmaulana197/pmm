<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function pengaduan(){
        $pengaduan = Pengaduan::all();
        return view('admin.pengaduan', compact('pengaduan'));
    }

    public function updatePengaduan(Request $request, $id){
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = $request->status;
        $pengaduan->update();
        return back()->with('success','Berhasil Memperbarui');
    }
}
