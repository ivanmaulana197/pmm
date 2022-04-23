<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultipleImage;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
// use Intervenion\Image\Facades\Image;
use Path\To\DOMDocument;
// use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Facades\Auth;
use PhpParser\Parser\Multiple;

use function Psy\debug;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.berita.berita',[
            'posts' =>$posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = [];

        $profile = Post::where('category_id', 1)->first();
        
        $categories = Category::all();
        return view('admin.berita.add-berita', [
            'categories'=>$categories,
        ]);
    }
    public function tes()
    {

        $categories = Category::all();
        return view('admin.berita.tes-berita', [
            'categories'=>$categories,
        ]);
    }

    // public function upload(Request $request){
    //     $mainImage = $request->file('file');
    //     $filename = time().'.'. $mainImage->exetension();
    //     Image::make($mainImage)->save(public_path('tinymce_images/'.$filename));

    //     return json_encode(['location' => asset('tinymce_images/'.$filename)]);

    // }
    public function upload(Request $request){
        // $fileName=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        // return response()->json(['location'=>asset("../storage/$path")]); 
        $image  = $request->file('file');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        return response()->json(['location'=>$result]); 
        
        
        // $imgpath = request()->file('file')->store('uploads', 'public'); 
        // return response()->json(['location' => "/storage/$imgpath"]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category_id' => 'required',
            // 'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);
        $profile = Post::where('category_id', 1)->first();
        $sejarah = Post::where('category_id', 2)->first();
        $visi = Post::where('category_id', 3)->first();
        $struktur = Post::where('category_id', 4)->first();
        

        if($profile != null){
            if($request->category_id == $profile->category_id){
                return back()->with('error','sudah ada');
            }
        }
        if($sejarah != null){
            if($request->category_id == $sejarah->category_id){
                return back()->with('error','sudah ada');
            }
        }
        if($visi != null){
            if($request->category_id == $visi->category_id){
                return back()->with('error','sudah ada');
            }
        }
        if($struktur != null){
            if($request->category_id == $struktur->category_id){
                return back()->with('error','sudah ada');
            }
        }
        
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        
        $data = Post::create([
            'title' => $request->title,
            'status' => $request->status,
            'category_id' => $request->category_id,
            // 'bosy' => $request->body,
            'body' => $request->body,
            'slug' => $slug,
            'user_id' => Auth::user()->id,
        ]);

        if($request->has('gambar')){
            foreach($request->file('gambar') as $gambar){
                // $file_name = time().'.'.$gambar->getClientOriginalName();
                // $gambar->storeAs('thumbnail', $file_name);
                $image = CloudinaryStorage::upload($gambar->getRealPath(), $gambar->getClientOriginalName());
                MultipleImage::create([
                    'post_id' => $data->id,
                    'path' => $image,
                ]);
            }
        }else{
            MultipleImage::create([
                'post_id' => $data->id,
                'path' => 'https://tamiajeng.my.id/desa/themes/batuah_22_4_2/images/pengganti.jpg',
            ]);
        }
        return redirect(route('berita'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        setlocale(LC_TIME,'id_ID');
        Carbon::setlocale('id');
        $images = MultipleImage::where('post_id',$post->id)->get();
        
        // dd(Carbon::now()->isoFormat('dddd, D MMMM Y'));
        return view('admin.berita.detail-berita', ['post'=>$post, 'images'=>$images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $images = MultipleImage::where('post_id',$post->id)->get();
        return view('admin.berita.edit-berita', [
            'post'=> $post,
            'images'=>$images,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'gambar[]' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);
     

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        
        if($request->has('gambar')){
            $images = MultipleImage::where('post_id',$post->id)->get();
            
            foreach($images as $image){
                CloudinaryStorage::delete($image->path);
                $image->delete();
            }
            foreach($request->gambar as $gambar){
                // $filename = time().'.'. $gambar->exetension();
                // $file_name = $gambar->getClientOriginalName();
                // $gambar->storeAs('thumbnail', $file_name);
                // MultipleImage::create([
                    //     'post_id' => $post->id,
                    //     'path' => $result,
                    // ]);
                    
                    $image = CloudinaryStorage::upload($gambar->getRealPath(), $gambar->getClientOriginalName());
                    
                    MultipleImage::create([
                        'post_id' => $post->id,
                        'path' => $image,
                    ]);
                    
            }
        }
            $post->update([
                'title' => $request->title,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'body' => $request->body,
                'slug' => $slug,
                'user_id' => Auth::user()->id,
            ]);
        return redirect(route('berita'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $images = MultipleImage::where('post_id',$post->id)->get();
        foreach($images as $image){
            CloudinaryStorage::delete($image->path);
            $image->delete();
        }
        $post->delete();
        return redirect(route('berita'));
    }
    
}
