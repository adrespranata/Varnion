<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKelamin::create(['kode' => '1', 'jenis_kelamin' => 'laki-laki']);
        JenisKelamin::create(['kode' => '2', 'jenis_kelamin' => 'perempuan']);
    }
}
