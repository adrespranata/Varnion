@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Hasil Response</h1>
    <a href="{{ route('fetchRandomData') }}" class="btn btn-success mb-2">Ambil Data Baru</a>
    <a href="{{ route('showProfessionSummary') }}" class="btn btn-primary mb-2">Lihat Ringkasan Profesi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Nama Jalan</th>
                <th>Email</th>
                <th>Nama Profesi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->RelasiJenisKelamin->jenis_kelamin }}</td>
                <td>{{ $item->nama_jalan }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->RelasiProfesi->nama_profesi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
