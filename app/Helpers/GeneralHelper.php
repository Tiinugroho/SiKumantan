<?php

if (!function_exists('bulanRomawi')) {
    function bulanRomawi($bulan)
    {
        $romawi = [
            1  => 'I',
            2  => 'II',
            3  => 'III',
            4  => 'IV',
            5  => 'V',
            6  => 'VI',
            7  => 'VII',
            8  => 'VIII',
            9  => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];

        if (!function_exists('generateNoSurat')) {
            function generateNoSurat()
            {
                // Hitung jumlah surat tahun ini
                $count = \App\Models\SuratMasuk::whereYear('tanggal_masuk', now()->year)->count() + 1;

                // Konversi bulan ke Romawi
                $romawi = bulanRomawi(now()->month);

                // Ambil tahun (misal: 2025)
                $tahun = now()->year;

                // Format no surat
                $noSurat = sprintf("%03d / SK-BPM / KMT / %s / %d", $count, $romawi, $tahun);

                return $noSurat;
            }
        }

        return $romawi[$bulan] ?? '';
    }
}
