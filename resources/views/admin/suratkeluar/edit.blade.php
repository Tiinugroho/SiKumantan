@extends('admin.partials.main')

@section('title', 'Edit Surat Keluar')

@section('content')
<div class="container">
    <h2>Edit Surat Keluar</h2>
    <form action="{{ route('admin.surat_keluar.update', $surat->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>No Surat</label>
            <input type="text" name="no_surat" value="{{ $surat->no_surat }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" value="{{ $surat->tanggal_keluar }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keperluan</label>
            <textarea name="keperluan" class="form-control" required>{{ $surat->keperluan }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Aktif" {{ $surat->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Tidak Aktif" {{ $surat->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
