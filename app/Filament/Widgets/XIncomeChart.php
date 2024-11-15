<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaction;
use Carbon\Carbon;

class XIncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Total Pemasukan';

    protected function getData(): array
    {
        // Ambil data pendapatan bulanan dengan status 'Diterima'
        $monthlyRevenue = Transaction::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total')
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
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

        // Isi data pendapatan per bulan
        $revenueData = [];
        foreach ($months as $month) {
            $revenueData[] = $monthlyRevenue->get($month, 0); // Gunakan 0 jika tidak ada pendapatan di bulan itu
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendapatan Bulanan',
                    'data' => $revenueData,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Menggunakan 'line' untuk tampilan chart garis
    }
}
