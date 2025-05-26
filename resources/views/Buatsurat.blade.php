@extends('pages.layout')
@section('title','Buat Surat')
@section('content')
<div class="container my-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <h2 class="text-center mb-4 text-success fw-bold">📄 Buat Surat Keterangan</h2>
        <form action="{{ route('simpansurat') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- Jenis Surat --}}
            <div class="form-floating mb-3">
                <select class="form-select" id="jenis_surat" name="jenis_surat" required>
                    <option value="" disabled selected>-- Pilih Jenis Surat --</option>
                    <option value="Surat Keterangan">Surat Keterangan</option>
                    <option value="Surat Domisili">Surat Domisili</option>
                    <option value="Surat Pengantar">Surat Pengantar</option>
                    <option value="Surat Izin">Surat Izin</option>
                </select>
                <label for="jenis_surat">Jenis Surat</label>
            </div>

            {{-- Nama Pemohon --}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon"
                    placeholder="Masukkan nama pemohon" required>
                <label for="nama_pemohon">Nama Pemohon</label>
            </div>

            {{-- NIK --}}
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                <label for="nik">NIK</label>
            </div>

            {{-- Alamat --}}
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Masukkan alamat lengkap" id="alamat" name="alamat"
                    style="height: 100px;" required></textarea>
                <label for="alamat">Alamat</label>
            </div>

            {{-- RT --}}
            <div class="form-floating mb-3">
                <select class="form-select" id="rt" name="rt" required>
                    <option value="" disabled selected>-- Pilih RT --</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="RT 0{{ $i }}">RT 0{{ $i }}</option>
                    @endfor
                </select>
                <label for="rt">RT</label>
            </div>

            {{-- RW --}}
            <div class="form-floating mb-3">
                <select class="form-select" id="rw" name="rw" required>
                    <option value="" disabled selected>-- Pilih RW --</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="RW 0{{ $i }}">RW 0{{ $i }}</option>
                    @endfor
                </select>
                <label for="rw">RW</label>
            </div>

            {{-- Keperluan --}}
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Masukkan keperluan surat" id="keperluan" name="keperluan"
                    style="height: 100px;" required></textarea>
                <label for="keperluan">Keperluan</label>
            </div>

            {{-- Tanggal Surat --}}
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                <label for="tanggal_surat">Tanggal Surat</label>
            </div>

            {{-- Upload KTP --}}
            <div class="mb-4">
                <label for="ktp" class="form-label fw-semibold">Upload KTP (gambar)</label>
                <input class="form-control" type="file" id="ktp" name="ktp" accept="image/*" required>
                <div class="form-text">File harus berupa gambar (.jpg, .jpeg, .png)</div>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-success w-100 py-2 fw-bold shadow-sm">
                🚀 Simpan Data Surat
            </button>
        </form>
    </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('message'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('message') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
