<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use App\Models\ProyekDesa;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProyekDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyeks = ProyekDesa::all();
        return view('admin.proyek-desa.proyek-desa', compact('proyeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.proyek-desa.add-proyek-desa');
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
            'namaKegiatan' => 'required',
            'lokasi' => 'required',
            'anggaran' => 'required',
            'volume' => 'required',
            'sumberDana' => 'required',
            'tahun' => 'required',
            'pelaksana' => 'required',
            'manfaat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $slug = SlugService::createSlug(ProyekDesa::class, 'slug', $request->namaKegiatan);
        $image = CloudinaryStorage::upload($request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
         
        ProyekDesa::create([
            'namaKegiatan'=> $request->namaKegiatan,
            'lokasi'=> $request->lokasi,
            'slug' => $slug,
            'anggaran'=> $request->anggaran,
            'volume'=> $request->volume,
            'sumberDana'=> $request->sumberDana,
            'tahun'=> $request->tahun,
            'pelaksana'=> $request->pelaksana,
            'manfaat'=> $request->manfaat,
            'keterangan'=> $request->keterangan,
            'gambar'=> $image,
        ]);
        return redirect(route('proyek-desa.index'))
            ->with('success','Proyek Desa berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProyekDesa $proyekDesa)
    {
        
        return view('admin.proyek-desa.detail-proyek-desa',compact('proyekDesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProyekDesa $proyekDesa)
    {
        return view('admin.proyek-desa.edit-proyek-desa', compact('proyekDesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProyekDesa $proyekDesa)
    {
        $updateProyek = $proyekDesa;
        $validated = $request->validate([
            'namaKegiatan' => 'required',
            'lokasi' => 'required',
            'anggaran' => 'required',
            'volume' => 'required',
            'sumberDana' => 'required',
            'tahun' => 'required',
            'pelaksana' => 'required',
            'manfaat' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
            $updateProyek->namaKegiatan = $request->namaKegiatan;
            $updateProyek->lokasi = $request->lokasi;
            $updateProyek->anggaran = $request->anggaran;
            $updateProyek->volume = $request->volume;
            $updateProyek->sumberDana = $request->sumberDana;
            $updateProyek->tahun = $request->tahun;
            $updateProyek->pelaksana = $request->pelaksana;
            $updateProyek->manfaat = $request->manfaat;
        if($request->has('gambar')){
            // $destination = 'storage/aparatur/'.$updateAparatur->gambar;
            // if(File::exists($destination)){
            //     File::delete($destination);
            // }
            // $imageName = time().'.'.$request->gambar->extension(); 
            // $request->gambar->storeAs('aparatur', $imageName);
            // $updateAparatur->gambar = $imageName;
            $result = CloudinaryStorage::replace($updateProyek->gambar, $request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
            $updateProyek->gambar = $result;
        }
        
        $updateProyek->update();
        return redirect(route('proyek-desa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProyekDesa $proyekDesa)
    {
        
        
        // $destination = 'storage/aparatur/'.$apar->gambar;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        CloudinaryStorage::delete($proyekDesa->gambar);
        $proyekDesa->delete();
        return back();
    }
}
