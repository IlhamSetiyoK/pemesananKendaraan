<?php

namespace app\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaction;

class CarsUsageChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $transaction = Transaction::join('cars', 'transactions.id_kendaraan', '=', 'cars.id')->get()->count();
        $data = [
            Transaction::leftjoin('cars', 'transactions.id_kendaraan', '=', 'cars.id')
                ->where('cars.jenis_kendaraan', 'angkutan orang')->get()->count(),
            Transaction::leftjoin('cars', 'transactions.id_kendaraan', '=', 'cars.id')
                ->where('cars.jenis_kendaraan', 'angkutan barang')->get()->count(),
        ];
        $label = [
            'angkutan orang',
            'angkutan barang',
        ];

        return $this->chart->pieChart()
            ->setTitle('Data Penggunaan Kendaraan per Kategori')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}
