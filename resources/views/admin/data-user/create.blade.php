@extends('admin.partials.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Form Tambah User</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label>NIK</label>
        <input type="text" name="nik" class="form-control" required>

        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required></textarea>

        <label>RT</label>
        <select name="agama" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Islam">1</option>
            <option value="Kristen">2</option>
            <option value="Katolik">3</option>
            <option value="Hindu">4</option>
            <option value="Buddha">5</option>
            <option value="Konghucu">6</option>
        </select>

        <label>RW</label>
        <select name="agama" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Islam">1</option>
            <option value="Kristen">2</option>
            <option value="Katolik">3</option>
            <option value="Hindu">4</option>
            <option value="Buddha">5</option>
            <option value="Konghucu">6</option>
        </select>

        <label>Agama</label>
        <select name="agama" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select>

        <label>Pekerjaan</label>
        <input type="text" name="pekerjaan" class="form-control" required>

        <label>Kewarganegaraan</label>
        <input type="text" name="kewarganegaraan" class="form-control" value="Indonesia" required>

        <button type="submit" class="btn btn-primary mt-3">Simpan Data</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
