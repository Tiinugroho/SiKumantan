@extends('admin.partials.main') 

@section('content')
    <div class="container">
        <h3>Edit Data Pengguna</h3>

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- NIK -->
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" value="{{ old('nik', $user->nik) }}" required>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email (opsional)</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}">
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Tempat & Tanggal Lahir -->
            <div class="mb-3 row">
                <div class="col">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"
                        value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                </div>
                <div class="col">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                        value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                </div>
            </div>

            <!-- Agama -->
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" name="agama" class="form-control" value="{{ old('agama', $user->agama) }}">
            </div>

            <!-- Pendidikan -->
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control"
                    value="{{ old('pendidikan', $user->pendidikan) }}">
            </div>

            <!-- Jenis Pekerjaan -->
            <div class="mb-3">
                <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                <input type="text" name="jenis_pekerjaan" class="form-control"
                    value="{{ old('jenis_pekerjaan', $user->jenis_pekerjaan) }}">
            </div>

            <!-- Foto KTP (optional) -->
            <div class="mb-3">
                <label for="photo_ktp" class="form-label">Foto KTP (Opsional - isi jika ingin diganti)</label>
                <input type="file" name="photo_ktp" class="form-control">
                @if($user->photo_ktp)
                    <small class="text-muted">KTP lama: <a href="{{ asset('storage/' . $user->photo_ktp) }}"
                            target="_blank">Lihat</a></small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection