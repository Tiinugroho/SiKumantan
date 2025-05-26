@extends('admin.partials.main')
@section('content')

  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">@yield('title')</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
      <a href="{{ route('user.create') }}" class="btn btn-sm btn-success">Tambah Data user</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>NIK</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Foto KTP</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datauser as $data)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nip }}</td>
        <td>{{ $data->nik }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->email }}</td>
        <td>
        <!-- Tombol lihat foto -->
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
          data-target="#modalKTP{{ $data->id }}">
          Lihat
        </button>
        </td>
        <td>
        @if ($data->status == 'pending')
        <a href="{{ route('user.verifikasi', $data->id) }}" class="btn btn-sm btn-success">Verifikasi</a>
      @else
        <span class="badge badge-success">Aktif</span>
      @endif
        </td>
        <td>
        <a href="{{ route('user.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{ route('user.destroy', $data->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"
          onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
        </form>
        </td>
        </tr>

        <!-- Modal Foto KTP -->
        <div class="modal fade" id="modalKTP{{ $data->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modalKTPLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="modalKTPLabel{{ $data->id }}">Foto KTP - {{ $data->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body text-center">
          <img src="{{ asset('storage/' . $data->photo_ktp) }}" alt="Foto KTP" class="img-fluid">
          </div>
        </div>
        </div>
        </div>
      @endforeach
        </tbody>

      </table>
      </div>
    </div>
    </div>
  </div>

@endsection