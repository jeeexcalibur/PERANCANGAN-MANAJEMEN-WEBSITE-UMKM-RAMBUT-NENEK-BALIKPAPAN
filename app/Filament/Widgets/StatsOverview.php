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

        // Hitung total penjualan (jumlah transaksi dengan status 'Diterima') dalam rentang tanggal yang ditentukan
        $totalSales = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($query) => $query->whereDate('created_at', '<=', $endDate))
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
            ->count();

        // Hitung total pendapatan (total dari kolom 'total') dalam rentang tanggal yang ditentukan dan status 'Diterima'
        $totalRevenue = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($query) => $query->whereDate('created_at', '<=', $endDate))
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
            ->sum('total');

        // Hitung total transaksi hari ini dengan status 'Diterima'
        $todaySales = Transaction::whereDate('created_at', today())
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
            ->count();

        // Hitung total pendapatan hari ini dengan status 'Diterima'
        $todayRevenue = Transaction::whereDate('created_at', today())
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
            ->sum('total');

        // Hitung total pelanggan unik dalam rentang tanggal yang ditentukan dan status 'Diterima'
        $uniqueCustomers = Transaction::when($startDate, fn($query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($query) => $query->whereDate('created_at', '<=', $endDate))
            ->where('status', 'Diterima') // Menambahkan filter status 'Diterima'
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
