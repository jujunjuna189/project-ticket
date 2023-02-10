<?php

namespace Database\Seeders;

use App\Models\LevelModel;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
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
                'id_level' => 1,
                'nama_level' => 'Admin',
            ],
            [
                'id_level' => 2,
                'nama_level' => 'Petugas',
            ],
            [
                'id_level' => 3,
                'nama_level' => 'Penupang',
            ]
        ];

        LevelModel::truncate();
        LevelModel::insert($array);
    }
}
