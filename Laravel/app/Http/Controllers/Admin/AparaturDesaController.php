<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AparaturDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AparaturDesa::all();
        return view('admin.info-desa.aparatur-desa', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = CloudinaryStorage::upload($request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
        // $imageName = time().'.'.$request->gambar->extension(); 
        // $request->gambar->storeAs('aparatur', $imageName); 
        
        AparaturDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'gambar' => $image
        ]);

        return back()
            ->with('success','Aparatur berhasil ditambahkan.');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateAparatur = AparaturDesa::find($id);
        $updateAparatur->nama = $request->nama;
        $updateAparatur->jabatan = $request->jabatan;
        if($request->has('gambar')){
            // $destination = 'storage/aparatur/'.$updateAparatur->gambar;
            // if(File::exists($destination)){
            //     File::delete($destination);
            // }
            // $imageName = time().'.'.$request->gambar->extension(); 
            // $request->gambar->storeAs('aparatur', $imageName);
            // $updateAparatur->gambar = $imageName;
            $result = CloudinaryStorage::replace($updateAparatur->gambar, $request->gambar->getRealPath(), $request->gambar->getClientOriginalName());
            $updateAparatur->gambar = $result;
        }
        $updateAparatur->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apar = AparaturDesa::find($id);
        // $destination = 'storage/aparatur/'.$apar->gambar;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        CloudinaryStorage::delete($apar->gambar);
        AparaturDesa::destroy($id);
        return back();
    }
}
