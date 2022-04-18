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
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        
        return response()->json(['location'=>asset("../storage/$path")]); 
        
        
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
            'status' => 'required',
        ]);

        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);

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
                $file_name = time().'.'.$gambar->getClientOriginalName();
                $gambar->storeAs('thumbnail', $file_name);
                MultipleImage::create([
                    'post_id' => $data->id,
                    'path' => $file_name,
                ]);
            }
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
        return view('admin.berita.edit-berita', [
            'post'=> $post,
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
       

        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);

        $post->update([
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
                $filename = time().'.'. $gambar->exetension();
                $file_name = $gambar->getClientOriginalName();
                $gambar->storeAs('thumbnail', $file_name);
                MultipleImage::create([
                    'post_id' => 1,
                    'path' => $file_name,
                ]);
            }
        }
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
        $post->delete();
        return redirect(route('berita'));
    }
    
}
