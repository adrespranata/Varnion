<?php

namespace App\Http\Controllers;

use App\Models\HasilResponse;
use App\RandomUser;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // JSON
    public function fetchRandomUserData()
    {
        $data = RandomUser::fetchData();

         $jenisKelamin = ($data['results'][0]['gender'] == 'female') ? 2 : 1;
         $nama = $data['results'][0]['name']['first'] . ' ' . $data['results'][0]['name']['last'];
         $namaJalan = $data['results'][0]['location']['street']['name'];
         $email = $data['results'][0]['email'];
         $md5Hash = md5(json_encode($data));
         $angkaKurang = substr_count($md5Hash, '0') + substr_count($md5Hash, '1') + substr_count($md5Hash, '2') + substr_count($md5Hash, '3') + substr_count($md5Hash, '4') + substr_count($md5Hash, '5') + substr_count($md5Hash, '6');
         $angkaLebih = strlen($md5Hash) - $angkaKurang;
         $profesi = chr(rand(65, 69));
         $plainJson = json_encode($data);

         HasilResponse::create([
            'jenis_kelamin' => $jenisKelamin,
            'nama' => $nama,
            'nama_jalan' => $namaJalan,
            'email' => $email,
            'angka_kurang' => $angkaKurang,
            'angka_lebih' => $angkaLebih,
            'profesi' => $profesi,
            'plain_json' => $plainJson,
        ]);
 
         return response()->json(['message' => 'Data Berhasil Disimpan']);
    }

    public function FetchData25Kali()
    {
        for ($i = 0; $i < 25; $i++) {
            $data = RandomUser::fetchData();

            $jenisKelamin = ($data['results'][0]['gender'] == 'female') ? 2 : 1;
            $nama = $data['results'][0]['name']['first'] . ' ' . $data['results'][0]['name']['last'];
            $namaJalan = $data['results'][0]['location']['street']['name'];
            $email = $data['results'][0]['email'];
            $md5Hash = md5(json_encode($data));
            $angkaKurang = substr_count($md5Hash, '0') + substr_count($md5Hash, '1') + substr_count($md5Hash, '2') + substr_count($md5Hash, '3') + substr_count($md5Hash, '4') + substr_count($md5Hash, '5') + substr_count($md5Hash, '6');
            $angkaLebih = strlen($md5Hash) - $angkaKurang;
            $profesi = chr(rand(65, 69));
            $plainJson = json_encode($data);

            HasilResponse::create([
                'jenis_kelamin' => $jenisKelamin,
                'nama' => $nama,
                'nama_jalan' => $namaJalan,
                'email' => $email,
                'angka_kurang' => $angkaKurang,
                'angka_lebih' => $angkaLebih,
                'profesi' => $profesi,
                'plain_json' => $plainJson,
            ]);
        }
        return response()->json(['message' => 'Data berhasil diambil 25 kali']);
    }

    public function professionSummary()
    {
        $ringkasan = HasilResponse::select('profesi', DB::raw('count(*) as jumlah'))
        ->groupBy('profesi')
        ->get();

        foreach ($ringkasan as $item) {
            $item->profesi = $item->RelasiProfesi->nama_profesi;
        }

        return response()->json(['ringkasan' => $ringkasan]);
    }

    // View
    public function fetchRandomData()
    {
        $data = RandomUser::fetchData();

         $jenisKelamin = ($data['results'][0]['gender'] == 'female') ? 2 : 1;
         $nama = $data['results'][0]['name']['first'] . ' ' . $data['results'][0]['name']['last'];
         $namaJalan = $data['results'][0]['location']['street']['name'];
         $email = $data['results'][0]['email'];
         $md5Hash = md5(json_encode($data));
         $angkaKurang = substr_count($md5Hash, '0') + substr_count($md5Hash, '1') + substr_count($md5Hash, '2') + substr_count($md5Hash, '3') + substr_count($md5Hash, '4') + substr_count($md5Hash, '5') + substr_count($md5Hash, '6');
         $angkaLebih = strlen($md5Hash) - $angkaKurang;
         $profesi = chr(rand(65, 69));
         $plainJson = json_encode($data);

         HasilResponse::create([
            'jenis_kelamin' => $jenisKelamin,
            'nama' => $nama,
            'nama_jalan' => $namaJalan,
            'email' => $email,
            'angka_kurang' => $angkaKurang,
            'angka_lebih' => $angkaLebih,
            'profesi' => $profesi,
            'plain_json' => $plainJson,
        ]);
        
        return redirect()->route('showData')->with('success', 'Data berhasil ditambahkan.');
    }

    public function fetchRandomData25Kali()
    {
        for ($i = 0; $i < 25; $i++) {
            $data = RandomUser::fetchData();

            $jenisKelamin = ($data['results'][0]['gender'] == 'female') ? 2 : 1;
            $nama = $data['results'][0]['name']['first'] . ' ' . $data['results'][0]['name']['last'];
            $namaJalan = $data['results'][0]['location']['street']['name'];
            $email = $data['results'][0]['email'];
            $md5Hash = md5(json_encode($data));
            $angkaKurang = substr_count($md5Hash, '0') + substr_count($md5Hash, '1') + substr_count($md5Hash, '2') + substr_count($md5Hash, '3') + substr_count($md5Hash, '4') + substr_count($md5Hash, '5') + substr_count($md5Hash, '6');
            $angkaLebih = strlen($md5Hash) - $angkaKurang;
            $profesi = chr(rand(65, 69));
            $plainJson = json_encode($data);

            HasilResponse::create([
                'jenis_kelamin' => $jenisKelamin,
                'nama' => $nama,
                'nama_jalan' => $namaJalan,
                'email' => $email,
                'angka_kurang' => $angkaKurang,
                'angka_lebih' => $angkaLebih,
                'profesi' => $profesi,
                'plain_json' => $plainJson,
            ]);
        }
        return redirect()->route('showData')->with('success', '25 Data berhasil ditambahkan.');
    }
    
    public function showData()
    {
        $data = HasilResponse::with(['RelasiJenisKelamin', 'RelasiProfesi'])
            ->orderBy('id', 'asc')
            ->get();
        return view('data')->with('data', $data);
    }
    public function showProfessionSummary()
    {
        $ringkasan = HasilResponse::select('profesi', DB::raw('count(*) as jumlah'))
            ->groupBy('profesi')
            ->get();

        foreach ($ringkasan as $item) {
            $item->nama_profesi = $item->RelasiProfesi->nama_profesi;
        }

        return view('ringkasan', compact('ringkasan'));
    }


}
