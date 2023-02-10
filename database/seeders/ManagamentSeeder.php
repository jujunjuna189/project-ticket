<?php

namespace Database\Seeders;

use App\Models\PetugasModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'username' => 'admin',
                'password' => Hash::make('12345678'),
                'nama_petugas' => 'Admin One',
                'id_level' => 1,
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('12345678'),
                'nama_petugas' => 'Petugas One',
                'id_level' => 2,
            ]
        ];

        PetugasModel::truncate();
        PetugasModel::insert($array);
    }
}
