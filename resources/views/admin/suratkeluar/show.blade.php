@extends('admin.partials.main')

@section('title', 'Detail Surat Keluar')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Surat Keluar</h1>

    <table class="table">
        <tr><th>No Surat</th><td>{{ $data->no_surat }}</td></tr>
        <tr><th>Nama Surat</th><td>{{ $data->nama_surat }}</td></tr>
        <tr><th>NIK</th><td>{{ $data->nik }}</td></tr>
        <tr><th>Nama</th><td>{{ $data->nama }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $data->jenis_kelamin }}</td></tr>
        <tr><th>Keperluan</th><td>{{ $data->keperluan }}</td></tr>
        <tr><th>Tanggal Surat</th><td>{{ $data->tanggal_surat }}</td></tr>
        <tr><th>Status</th><td>{{ $data->status }}</td></tr>
    </table>

    <a href="{{ route('admin.suratkeluar.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
