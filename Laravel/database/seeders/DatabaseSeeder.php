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
            'namaDesa' => Str::random(10),
            'namaKabupaten' => Str::random(10),
            'namaKecamatan' => Str::random(10),
            'namaProvinsi' => Str::random(10),
            'logo' => '1650182275.png',
        ]);
        DB::table('pemerintah_desas')->insert([
            'namaKepalaDesa' => Str::random(10),
            'kantor' => Str::random(10),
            'telp' => Str::random(10),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'is_admin' => true,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'password' => bcrypt('12345')
        ]);
    }
}
