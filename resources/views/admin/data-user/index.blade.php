@extends('admin.partials.main')
@section('title', 'Data User')
@section('content')

  <div class="container-fluid">
    <h1 class="h2 mb-2 text-gray-800">Data Pengguna</h1>

    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Tambah Data User</a>

      {{-- Form Search --}}
      <form action="{{ route('users.index') }}" method="GET" class="form-inline ml-auto">
      <div class="input-group">
        <input type="text" name="keyword" value="{{ request('keyword') }}"
        class="form-control bg-light border-0 small" placeholder="Cari NIK atau Nama..." aria-label="Search"
        aria-describedby="basic-addon2" oninput="this.form.submit()" autocomplete="off" />
        <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
        </div>
      </div>
      </form>
    </div>

    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>NIK</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Agama</th>
          <th>Pendidikan</th>
          <th>Jenis Pekerjaan</th>
          <th>Photo KTP</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $index => $data)
        <tr>
        <td>{{ $users->firstItem() + $index }}</td>
        <td>{{ $data->name ?? '-' }}</td>
        <td>{{ $data->nik ?? '-' }}</td>
        <td>{{ $data->alamat ?? '-' }}</td>
        <td>{{ $data->jenis_kelamin ?? '-' }}</td>
        <td>{{ $data->tempat_lahir ?? '-' }}</td>
        <td>{{ $data->tanggal_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
        <td>{{ $data->agama ?? '-' }}</td>
        <td>{{ $data->pendidikan ?? '-' }}</td>
        <td>{{ $data->jenis_pekerjaan ?? '-' }}</td>
        <td>
        @if ($data->photo_ktp)
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
        data-target="#modalKTP{{ $data->id }}">Lihat</button>
      @else
        -
      @endif
        </td>
        <td>
        @if ($data->status == 'pending')
        <a href="{{ route('users.verifikasi', $data->id) }}" class="btn btn-sm btn-success"
        onclick="return confirm('Verifikasi user ini?')">Verifikasi</a>
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
        data-target="#tolakModal{{ $data->id }}">Tolak</button>
      @elseif ($data->status == 'aktif')
        <span class="badge badge-success">Aktif</span>
      @elseif ($data->status == 'ditolak')
        <span class="badge badge-danger">Ditolak</span>
      @else
        <span class="badge badge-secondary">{{ ucfirst($data->status) }}</span>
      @endif
        </td>
        <td>
        <a href="{{ route('users.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{ route('users.destroy', $data->id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"
          onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
        </form>
        </td>
        </tr>
      @empty
      <tr>
        <td colspan="13" class="text-center">Data tidak ditemukan</td>
      </tr>
      @endforelse
        </tbody>
      </table>
      </div>

      <div class="d-flex justify-content-center mt-4">
      {{ $users->appends(['keyword' => request('keyword')])->links('pagination::bootstrap-4') }}
      </div>
    </div>
    </div>
  </div>

  {{-- Modal KTP --}}
  @foreach ($users as $data)
    @if ($data->photo_ktp)
    <div class="modal fade" id="modalKTP{{ $data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalKTPLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Foto KTP - {{ $data->name }}</h5>
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
    @endif
  @endforeach

  {{-- Modal Tolak --}}
  @foreach ($users as $data)
    <div class="modal fade" id="tolakModal{{ $data->id }}" tabindex="-1" aria-labelledby="tolakModalLabel{{ $data->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{ route('users.tolak', $data->id) }}" method="POST">
      @csrf
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="tolakModalLabel{{ $data->id }}">Alasan Penolakan</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
      <label for="alasan_tolak{{ $data->id }}" class="form-label">Alasan</label>
      <textarea name="alasan_tolak" id="alasan_tolak{{ $data->id }}" class="form-control" required></textarea>
      </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-danger">Tolak Akun</button>
      </div>
      </div>
    </form>
    </div>
    </div>
  @endforeach

@endsection