@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ringkasan Data Profesi</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Profesi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ringkasan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_profesi }}</td>
                <td>{{ $item->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
