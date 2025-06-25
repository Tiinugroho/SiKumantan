@extends('admin.partials.main')

@section('title', 'Buat Surat Keterangan Tidak Mampu')

@section('content')
    <div class="container">
        <h1 class="mb-4">Buat Surat Keterangan Tidak Mampu</h1>

        <table class="table table-bordered">
            <tr>
                <th width="35%">Nama</th>
                <td>{{ $surat->user->name }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $surat->user->nik }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $surat->user->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>
                    {{ $surat->user->tempat_lahir ?? '-' }},
                    {{ $surat->user->tanggal_lahir ? \Carbon\Carbon::parse($surat->user->tanggal_lahir)->format('d-m-Y') : '-' }}
                </td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $surat->user->agama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>{{ $surat->user->jenis_pekerjaan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $surat->user->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Keperluan</th>
                <td>{{ $surat->keperluan }}</td>
            </tr>
        </table>

        <form action="{{ route('admin.surat_tidak_mampu.store_surat', $surat->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="no_surat" class="form-label">No Surat</label>
                <input type="text" name="no_surat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Surat</button>
        </form>
    </div>
@endsection