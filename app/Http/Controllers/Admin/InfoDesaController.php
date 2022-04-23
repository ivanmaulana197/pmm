<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use App\Models\IdentitasDesa;
use App\Models\PemerintahDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InfoDesaController extends Controller
{
    public function identitasDesa(){

        $identitas = IdentitasDesa::find(1);
        return view('admin.info-desa.identitas-desa', compact('identitas'));
    }

    public function storeIdentitas(Request $request){
        $validated = $request->validate([
            'namaDesa' => 'required',
            'namaKecamatan' => 'required',
            'namaKabupaten' => 'required',
            'namaProvinsi' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
       
        $updateIdentitas = IdentitasDesa::find(1);
        $updateIdentitas->namaDesa = $request->namaDesa;
        $updateIdentitas->namaKecamatan = $request->namaKecamatan;
        $updateIdentitas->namaKabupaten = $request->namaKabupaten;
        $updateIdentitas->namaProvinsi = $request->namaProvinsi;
        if($request->has('logo')){
            $result = CloudinaryStorage::replace($updateIdentitas->logo, $request->logo->getRealPath(), $request->logo->getClientOriginalName());
            
            $updateIdentitas->logo = $result;

        }
        $updateIdentitas->update();
        return back()
        ->with('success','Aparatur berhasil diperbarui.');
    }

    public function pemerintahanDesa(){
        $pemerintahan = PemerintahDesa::find(1);
        return view('admin.info-desa.pemerintahan-desa', compact('pemerintahan'));
    }

    public function storePemerintahan(Request $request){

        $validated = $request->validate([
            'namaKepalaDesa' => 'required',
            'kantor' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);
        $updatePemerintahan = PemerintahDesa::find(1);
        $updatePemerintahan->namaKepalaDesa = $request->namaKepalaDesa;
        $updatePemerintahan->kantor = $request->kantor;
        $updatePemerintahan->telp = $request->telp;
        $updatePemerintahan->email = $request->email;
        $updatePemerintahan->update();
        return back()->with('success','pemerintahan desa berhasil diperbarui.');
        
    }
}
