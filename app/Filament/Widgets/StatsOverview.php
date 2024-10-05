<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        // Ambil startDate dan endDate dari filter, jika tidak ada maka gunakan null untuk startDate dan tanggal sekarang untuk endDate
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? now();

        // Ubah startDate dan endDate menjadi objek Carbon jika ada
        $startDate = $startDate ? Carbon::parse($startDate) : null;
        $endDate = Carbon::parse($endDate);

        // Hitung total penjualan (jumlah transaksi) dalam rentang tanggal yang ditentukan
        $totalSales = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->whereDate('created_at', '<=', $endDate)
            ->count();

        // Hitung total pendapatan (total dari kolom 'total') dalam rentang tanggal yang ditentukan
        $totalRevenue = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->whereDate('created_at', '<=', $endDate)
            ->sum('total');

        // Hitung total transaksi hari ini
        $todaySales = Transaction::whereDate('created_at', today())->count();

        // Hitung total pendapatan hari ini
        $todayRevenue = Transaction::whereDate('created_at', today())->sum('total');

        // Hitung total pelanggan unik dalam rentang tanggal yang ditentukan
        $uniqueCustomers = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->whereDate('created_at', '<=', $endDate)
            ->distinct('user_id')
            ->count('user_id');

        return [
            Stat::make('Total Penjualan', $totalSales),
            Stat::make('Total Pendapatan', number_format($totalRevenue) . ' IDR'),
            Stat::make('Pendapatan Hari Ini', number_format($todayRevenue) . ' IDR'),
            Stat::make('Total Transaksi Hari Ini', $todaySales),
        ];
    }

    // Konfigurasikan filter
    protected function getFilters(): array
    {
        return [
            'startDate' => fn () => null,
            'endDate' => fn () => now(),
        ];
    }
}
