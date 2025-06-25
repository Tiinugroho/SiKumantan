@extends('admin.partials.main')

@section('title', 'Data Surat Keluar')

@section('content')
    <div class="container">
        <h1 class="mb-4">Data Surat Keluar</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Surat</th>
                    <th>No Surat</th>
                    <th>Tanggal Keluar</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_surat }}</td>
                            <td>{{ $item->no_surat }}</td>
                            <td>{{ $item->tanggal_keluar }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>
                                <span class="badge
                    @if($item->status == 'Menunggu ACC Sekda') bg-warning text-dark
                    @elseif($item->status == 'Selesai') bg-success
                    @elseif($item->status == 'Aktif') bg-white
                        @else bg-secondary
                    @endif">
                                    {{ $item->status ?? 'Belum Diproses' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.suratkeluar.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('admin.suratkeluar.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning">Perbarui</a>

                                {{-- Tombol Preview & Download Surat --}}
                                <a href="{{ route('surat_tidak_mampu.preview', $item->id) }}" target="_blank"
                                    class="btn btn-sm btn-success mt-1">Preview</a>
                                <a href="{{ route('surat_tidak_mampu.download', $item->id) }}"
                                    class="btn btn-sm btn-primary mt-1">Download</a>
                            </td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada surat keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection