<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Http\Controllers\Controller;
use App\Models\CategoryLapakDesa;
use App\Models\LapakDesa;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LapakDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapaks = LapakDesa::all();
        $categories = CategoryLapakDesa::all();
        return view('admin.lapak-desa.lapak-desa',compact('lapaks','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryLapakDesa::all();
        return view('admin.lapak-desa.add-lapak-desa',compact('categories'));
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
            'namaLapak' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'keterangan' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'pelapak' => 'required',
            'NoWA' => 'required',
        ]);
        $slug = SlugService::createSlug(LapakDesa::class, 'slug', $request->namaLapak);
        $image = CloudinaryStorage::upload($request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
         
        LapakDesa::create([
            'namaLapak' => $request->namaLapak,
            'slug' => $slug,
            'category_id'=> $request->category_id,
            'keterangan' => $request->keterangan,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'pelapak' => $request->pelapak,
            'NoWA' => $request->NoWA,
            'gambar'=> $image,
        ]);
        return redirect(route('lapak-desa.index'))
            ->with('success','Lapak Desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LapakDesa $lapakDesa)
    {
        $lapak = $lapakDesa;
        $categories = CategoryLapakDesa::all();
        return view('admin.lapak-desa.edit-lapak-desa', compact('lapak', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LapakDesa $lapakDesa)
    {
        $updateLapak = $lapakDesa;
        $validated = $request->validate([
            'namaLapak' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'keterangan' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'pelapak' => 'required',
            'NoWA' => 'required',
        ]);
        $slug = SlugService::createSlug(LapakDesa::class, 'slug', $request->namaLapak);
            $updateLapak->namaLapak = $request->namaLapak;
            $updateLapak->alamat = $request->alamat;
            $updateLapak->slug = $slug;
            $updateLapak->keterangan = $request->keterangan;
            $updateLapak->harga = $request->harga;
            $updateLapak->pelapak = $request->pelapak;
            $updateLapak->NoWA = $request->NoWA;
        if($request->has('gambar')){
            // $destination = 'storage/aparatur/'.$updateAparatur->gambar;
            // if(File::exists($destination)){
            //     File::delete($destination);
            // }
            // $imageName = time().'.'.$request->gambar->extension(); 
            // $request->gambar->storeAs('aparatur', $imageName);
            // $updateAparatur->gambar = $imageName;
            $result = CloudinaryStorage::replace($updateLapak->gambar, $request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
            $updateLapak->gambar = $result;
        }
        
        $updateLapak->update();
        return redirect(route('lapak-desa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LapakDesa $lapakDesa)
    {
        CloudinaryStorage::delete($lapakDesa->gambar);
        $lapakDesa->delete();
        return back();
    }
}
