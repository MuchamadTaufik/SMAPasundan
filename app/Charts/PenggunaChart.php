<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenggunaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $user = User::all();

        $admin = 0;
        $siswa = 0;
        $guru = 0;

        foreach ($user as $data) {
            if ($data->role == 'admin') {
                $admin++;
            } elseif ($data->role == 'siswa') {
                $siswa++;
            } elseif ($data->role == 'guru'){
                $guru++;
            }
        }

        $datas = [$admin, $siswa, $guru];
        $label = ['Admin','Siswa','Guru'];

        return $this->chart->donutChart()
            // ->setTitle('Top 3 scorers of the team.')
            // ->setSubtitle('Season 2021.')
            ->addData($datas)
            ->setLabels($label);
    }
}
