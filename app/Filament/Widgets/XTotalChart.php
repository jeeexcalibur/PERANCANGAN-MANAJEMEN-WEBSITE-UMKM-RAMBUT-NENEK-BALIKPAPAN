<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction;
use Carbon\Carbon;

class XTotalChart extends ChartWidget
{
    protected static ?string $heading = 'Total Penjualan';

    protected function getData(): array
    {
        // Ambil data penjualan bulanan (jumlah transaksi)
        $monthlySales = Transaction::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                $monthName = Carbon::create()->month($item->month)->format('M');
                return [$monthName => $item->total];
            });

        // Daftar bulan (Jan - Dec)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Isi data penjualan per bulan
        $salesData = [];
        foreach ($months as $month) {
            $salesData[] = $monthlySales->get($month, 0); // Gunakan 0 jika tidak ada penjualan di bulan itu
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan Bulanan',
                    'data' => $salesData,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Menggunakan 'bar' untuk tampilan chart batang
    }
}
