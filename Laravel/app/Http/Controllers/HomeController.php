<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use App\Models\Berita;
use App\Models\IdentitasDesa;
use App\Models\MultipleImage;
use App\Models\PemerintahDesa;
use App\Models\Pengaduan;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home()
    {
        $data = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/776/tanggal/'.date("Y-m-d"))->json()['jadwal']['data'];
        $posts = Post::latest()->paginate(6);
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('home', compact('data', 'posts', 'identitas', 'pemerintahan', 'aparaturs'));
    }
    public function about()
    {
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('about' , compact('identitas', 'pemerintahan', 'aparaturs'));
    }

    public function pengaduan(){
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('pengaduan.pengaduan' , compact('identitas', 'pemerintahan', 'aparaturs'));
    }
    public function storePengaduan(Request $request){
        $request->validate([
            'nama' => 'required|max:255',
            'pengaduan' => 'required',
        ]);
        
        Pengaduan::create([
            'nama' => $request->nama,
            'pengaduan' => $request->pengaduan,

        ]);
        return back()->with('success', 'Pengaduan Berhasil dikirim');
    }
    
    public function aparatur(){
        
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('aparatur-desa.index' , compact('identitas', 'pemerintahan', 'aparaturs'));
    }

    public function profileWilayah(){
        $profile = Post::where('category_id',1)->first();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('profile-wilayah' , compact('profile','identitas', 'pemerintahan', 'aparaturs'));
    }
    
    public function sejarahDesa(){
        $sejarah = Post::where('category_id',2)->first();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('sejarah-desa' , compact('sejarah','identitas', 'pemerintahan', 'aparaturs'));
    }
    
    public function visiMisi(){
        $visimisi = Post::where('category_id',3)->first();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('visi-misi-desa' , compact('visimisi','identitas', 'pemerintahan', 'aparaturs'));
    }
    public function strukturDesa(){
        $struktur = Post::where('category_id',4)->first();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('struktur-desa' , compact('struktur','identitas', 'pemerintahan', 'aparaturs'));
    }

}
