<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilResponse extends Model
{
    use HasFactory;

    protected $table = 'hasil_response';
    public $timestamps = true;

    protected $fillable = [
        'jenis_kelamin',
        'nama',
        'nama_jalan',
        'email',
        'angka_kurang',
        'angka_lebih',
        'profesi',
        'plain_json',
    ];

    public function RelasiJenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin');
    }

    public function RelasiProfesi()
    {
        return $this->belongsTo(Profesi::class, 'profesi', 'kode');
    }

}
