<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin: 30px 50px;
        }

        .header {
            text-align: center;
        }

        .header img {
            position: absolute;
            top: 20px;
            left: 50px;
            width: 80px;
            height: 80px;
        }

        .header-text {
            line-height: 1.2;
            font-size: 14pt;
        }

        .header-text b {
            font-size: 16pt;
        }

        .line {
            border-bottom: 3px solid #000;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .judul-surat {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 10px;
        }

        table td {
            vertical-align: top;
            font-size: 12pt;
        }

        .isi p {
            text-align: justify;
            margin-bottom: 10px;
        }

        .ttd {
            width: 40%;
            text-align: center;
            float: right;
        }

        .ttd p {
            margin: 0;
            font-size: 12pt;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('fn/images/logokampar.png') }}" alt="Logo Desa">
        <div class="header-text">
            <b>PEMERINTAH KABUPATEN KAMPAR</b><br>
            KECAMATAN BANGKINANG<br>
            <b>DESA KUMANTAN</b><br>
            <small>Alamat : Jl. Mahmud Marzuki No. Kumantan Kode Pos : 28451</small>
        </div>
    </div>

    <div class="line"></div>

    <p class="judul-surat">SURAT KETERANGAN TIDAK MAMPU</p>
    <p class="nomor-surat">Nomor : {{ $no_surat }}</p>

    <div class="isi">
        <p>Yang bertanda tangan di bawah ini :</p>
        <table>
            <tr>
                <td style="width: 35%">Nama</td>
                <td>: <b>MASRI DALMI, S.SOS</b></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: Kepala Desa Kumantan</td>
            </tr>
        </table>

        <p>Dengan ini menerangkan bahwa :</p>
        <table>
            <tr>
                <td style="width: 35%">Nama</td>
                <td>: {{ $nama }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Tempat / Tgl Lahir</td>
                <td>: {{ $tempat_lahir }} / {{ $tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>Bangsa / Agama</td>
                <td>: Indonesia / {{ $agama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $jenis_pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $alamat }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $nik }}</td>
            </tr>
        </table>

        <p>Berdasarkan data yang ada dan sepengetahuan kami benar nama tersebut di atas penduduk Desa Kumantan Kecamatan
            Bangkinang Kota Kabupaten Kampar dan ianya benar tergolong kepada <b>TIDAK MAMPU</b>.</p>

        <p>Surat keterangan ini diberikan untuk melengkapi persyaratan :</p>
        <p style="text-align: center;"><b>{{ $keperluan }}</b></p>

        <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="ttd">
        <p>Dikeluarkan di : Kumantan</p>
        <p>Pada tanggal : {{ $tanggal_keluar }}</p>
        <p style="margin-top: 20px;">KEPALA DESA KUMANTAN</p>
        <br><br><br>
        <p><b>MASRI DALMI, S.SOS</b></p>
    </div>

</body>

</html>
