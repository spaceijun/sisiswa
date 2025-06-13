<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kelasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'IPA'],
            ['nama_kategori' => 'IPS'],
            ['nama_kategori' => 'TKJ'],
            ['nama_kategori' => 'TKR'],
            ['nama_kategori' => 'RPL'],
            ['nama_kategori' => 'MULTIMEDIA'],
            ['nama_kategori' => 'AKUNTANSI'],
            ['nama_kategori' => 'OTKP'],
        ];

        DB::table('kelas_categories')->insert($categories);
    }
}
