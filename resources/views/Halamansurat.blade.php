@extends('pages.layout')

@section('title', 'Halaman Surat')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Surat Keterangan Kelahiran -->
         <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN KELAHIRAN DAN PROSES PENGAJUAN AKTA KELAHIRAN</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Surat pengatar RT/RW</li>
                        <li>Fotocopy KK dan KTP-elorang tua</li>
                        <li>fotocopy surat nikah orang tua</li>
                        <li>Surat keterangan kelahiran dari dokter/bidan penolong melahirkan</li>
                        <li>Fotocopy ijazah bagi yang memiliki</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Keterangan kematian -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN KEMATIAN DAN PROSES PENGAJUAN AKTA KEMATIAN</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK dan KTP-el yang meninggal dunia</li>
                        <li>Surat Keterangan Kematian dari Dokter/Rumah Sakit</li>
                        <li>Fotokopi KTP Pelapor</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN TIDAK MAMPU SKTM</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK dan KTP-el pemohon</li>
                        <li>Maksud dan keperluan pengurusan surat</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

                <!-- Surat Keterangan Usaha -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN DOMISILI TEMPAT TINGGAL</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK dan KTP-el pemohon</li>
                        <li>Maksud dan keperluan pengurusan surat</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

                <!-- Surat Keterangan Usaha -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN USAHA</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK dan alamat usaha</li>
                        <li>Nama usaha dan alamat usaha</li>
                        <li>Maksud dan keperluan pengurusan surats</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

                <!-- Surat Keterangan Usaha -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN LAIN LAIN-LAIN</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Fotokopi KTP</li>
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK</li>
                        <li>Pas Foto 3x4</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

                <!-- Surat Keterangan Usaha -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT PENGANTAR NIKAH/PERKAWINAN</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Fotokopi KTP</li>
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK</li>
                        <li>Pas Foto 3x4</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>

                <!-- Surat Keterangan Usaha -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title text-dark">SURAT KETERANGAN AHLI WARIS</h2>
                    <h5 class="text-dark font-weight-bold mt-3">Persyaratan:</h5>
                    <ul class="text-muted">
                        <li>Fotokopi KTP</li>
                        <li>Surat Pengantar RT/RW</li>
                        <li>Fotokopi KK</li>
                        <li>Pas Foto 3x4</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="{{ route('buatsurat') }}" class="btn btn-primary btn-block">Buat Surat</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambahkan surat lainnya di sini -->


    </div>
</div>
@endsection
