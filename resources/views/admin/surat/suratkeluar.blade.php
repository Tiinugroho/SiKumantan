@extends('admin.partials.main')
@section('content')

<div class="container mt-4">
  <h3>Data Surat Keluar</h3>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Tanggal</th>
        <th>Tujuan</th>
        <th>Perihal</th>
        <th>File</th>
      </tr>
    </thead>
    <tbody>
      @foreach($suratKeluar as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nomor_surat }}</td>
          <td>{{ $item->tanggal_surat }}</td>
          <td>{{ $item->tujuan }}</td>
          <td>{{ $item->perihal }}</td>
          <td><a href="{{ asset('storage/' . $item->file_surat) }}" target="_blank">Lihat</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
