<?php

namespace App\Http\Controllers;

use App\Models\AparaturDesa;
use App\Models\IdentitasDesa;
use App\Models\PemerintahDesa;
use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(8);
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('berita.index', compact('posts', 'identitas', 'pemerintahan', 'aparaturs'));
    }

    public function show(Post $post){
        $identitas = IdentitasDesa::find(1);
        $pemerintahan = PemerintahDesa::find(1);
        $aparaturs = AparaturDesa::all();
        return view('berita.detail', compact('post', 'identitas', 'pemerintahan', 'aparaturs'));
    }
}
