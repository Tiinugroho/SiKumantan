@extends('admin.partials.main')
@section('content')

<div class="container mt-4">
  <h3>Form Surat Masuk</h3>
  <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label>Nomor Surat</label>
      <input type="text" name="nomor_surat" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Tanggal Surat</label>
      <input type="date" name="tanggal_surat" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Pengirim</label>
      <input type="text" name="pengirim" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Perihal</label>
      <input type="text" name="perihal" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Upload File Surat (PDF/JPG)</label>
      <input type="file" name="file_surat" class="form-control-file" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

@endsection
