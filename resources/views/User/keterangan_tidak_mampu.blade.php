@extends('pages.layout')
@section('content')

<div class="container">
    <h3>Ajukan Surat Keterangan Tidak Mampu</h3>

    <form action="{{ route('keterangan_tidak_mampu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>NIK:</label>
            <input type="text" value="{{ Auth::user()->nik }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin:</label>
            <input type="text" value="{{ Auth::user()->jenis_kelamin }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Foto KK:</label>
            <input type="file" name="foto_kk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Surat Pengantar RT/RW:</label>
            <input type="file" name="foto_pengantar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keperluan:</label>
            <textarea name="keperluan" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Surat</button>
    </form>
</div>

@if(session('success'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil!',
  text: '{{ session("success") }}',
  confirmButtonText: 'OK'
});
</script>
@endif

@endsection
