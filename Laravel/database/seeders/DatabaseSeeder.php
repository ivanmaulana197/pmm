<?php

namespace Database\Seeders;

use App\Models\IdentitasDesa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identitas_desas')->insert([
            'namaDesa' => 'Tamiajeng',
            'namaKabupaten' => 'Mojokerto',
            'namaKecamatan' => 'Trawas',
            'namaProvinsi' => 'Jawa Timur',
            'logo' => 'https://res.cloudinary.com/tamiajeng/image/upload/v1650433338/tamiajeng/2022-04-20_054217_Desain__sid__fFcxJnC.png',
        ]);
        DB::table('pemerintah_desas')->insert([
            'namaKepalaDesa' => 'WARNOTO',
            'kantor' => 'Jl. Raya Tamiajeng No. 55',
            'telp' => '081235226495',
            'email' => 'Desatamiajeng04@gmail.com',
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'is_admin' => true,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'password' => bcrypt('12345')
        ]);
        DB::table('categories')->insert([
            'nama_category' => 'Profile Desa',
            'slug'=> 'profile-desa'
        ]);
        DB::table('categories')->insert([
            'nama_category' => 'Sejarah Desa',
            'slug'=> 'sejarah-desa'
        ]);
        DB::table('categories')->insert([
            'nama_category' => 'Visi dan Misi',
            'slug'=> 'visi-misi'
        ]);
        DB::table('categories')->insert([
            'nama_category' => 'Struktur Desa',
            'slug'=> 'struktur-desa'
        ]);
    }
}
