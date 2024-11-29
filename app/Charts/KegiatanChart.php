<?php

namespace App\Charts;

use App\Models\Kegiatan;
use App\Models\Kunjungan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KegiatanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        // Mengambil semua data kegiatan dan kunjungan
        $kegiatan = Kegiatan::all();
        $kunjungans = Kunjungan::all();

        // Inisialisasi variabel untuk menghitung jenis kegiatan
        $bimbingan = 0;
        $konsultasi = 0;
        $kunjungan = 0;

        // Menghitung jumlah bimbingan dan konsultasi berdasarkan jenis_kegiatans_id
        foreach ($kegiatan as $data) {
            if ($data->jenis_kegiatans_id == 1) {
                $bimbingan++;
            } elseif ($data->jenis_kegiatans_id == 2) {
                $konsultasi++;
            }
        }

        // Menghitung total kunjungan
        $kunjungan = $kunjungans->count();

        // Data untuk chart
        $data = [$bimbingan, $konsultasi, $kunjungan];
        $labels = ['Bimbingan', 'Konsultasi', 'Kunjungan'];

        // Membuat dan mengembalikan chart donat
        return $this->chart->donutChart()
            ->addData($data)
            ->setLabels($labels);
    }
}
