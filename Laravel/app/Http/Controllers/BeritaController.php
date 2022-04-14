<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('berita.index', ['posts' =>$posts]);
    }

    public function show(Request $request){
        $post = Post::find($request->slug);
        return view('berita.detail', ['post' => $post]);
    }
}
