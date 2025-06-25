@extends('admin.partials.main')

@section('title', 'Data Surat Keterangan Tidak Mampu')

@section('content')
    <div class="container">
        <h1 class="mb-4">Data Surat Keterangan Tidak Mampu</h1>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Keperluan</th>
                    <th>Foto KK</th>
                    <th>Surat Pengantar RT/RW</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->nik }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->jenis_kelamin }}</td>
                        <td>{{ $item->keperluan }}</td>

                        <td>
                            @if($item->foto_kk && file_exists(public_path('storage/' . $item->foto_kk)))
                                <a href="{{ asset('storage/' . $item->foto_kk) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">Lihat</a>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        <td>
                            @if($item->foto_pengantar && file_exists(public_path('storage/' . $item->foto_pengantar)))
                                <a href="{{ asset('storage/' . $item->foto_pengantar) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">Lihat</a>
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        <td>
                            <span class="badge 
                                    @if($item->status == 'Menunggu aktif') bg-secondary
                                    @elseif($item->status == 'Disetujui') bg-success
                                    @elseif($item->status == 'Menunggu Tanda Tangan Sekretaris') bg-warning
                                        @else bg-light text-dark
                                    @endif">
                                {{ $item->status ?? 'Belum Diproses' }}
                            </span>
                        </td>

                        <td>
                            @if($item->status == 'Menunggu Verifikasi')
                                <a href="{{ route('admin.surat_tidak_mampu.verifikasi', $item->id) }}"
                                    class="btn btn-sm btn-warning">Verifikasi</a>

                            @elseif($item->status == 'Disetujui')
                                <a href="{{ route('admin.Buatsurat.Suket_Tidak_Mampu', $item->id) }}"
                                    class="btn btn-sm btn-success">Buat Surat</a>

                            @elseif($item->status == 'Menunggu Tanda Tangan Sekretaris')
                                <a href="{{ route('admin.suratkeluar.show', $item->id) }}" class="btn btn-sm btn-info">Lihat
                                    Surat</a>

                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Belum ada data surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection