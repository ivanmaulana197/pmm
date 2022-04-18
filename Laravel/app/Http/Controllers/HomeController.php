<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\IdentitasDesa;
use App\Models\PemerintahDesa;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home()
    {
        $data = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/776/tanggal/'.date("Y-m-d"))->json()['jadwal']['data'];
        $posts = Post::all();
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        return view('home', compact('data', 'posts', 'identitas', 'pemerintahan'));
    }
    public function about()
    {
        return view('about');
    }

    public function date(){
        $now = Carbon::now()->isoFormat('YYYY-MM-DD');
        return $now;
    }
}
