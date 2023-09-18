<?php

namespace Database\Seeders;

use App\Models\Profesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profesi::create(['kode' => 'A', 'nama_profesi' => 'Petani']);
        Profesi::create(['kode' => 'B', 'nama_profesi' => 'Teknisi']);
        Profesi::create(['kode' => 'C', 'nama_profesi' => 'Guru']);
        Profesi::create(['kode' => 'D', 'nama_profesi' => 'Nelayan']);
        Profesi::create(['kode' => 'E', 'nama_profesi' => 'Seniman']);
    }
}
