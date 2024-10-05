<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;

class ProductStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Hitung total produk
        $totalProducts = Product::count();

        // Dapatkan produk dengan stok terbanyak
        $highestStockProduct = Product::orderBy('stock', 'desc')->first();

        // Dapatkan produk dengan stok terkecil
        $lowestStockProduct = Product::orderBy('stock', 'asc')->first();

        return [
            Stat::make('Total Produk', $totalProducts),
            Stat::make('Produk dengan Stok Terbanyak', $highestStockProduct ? "{$highestStockProduct->name} ({$highestStockProduct->stock} unit)" : 'Tidak ada produk'),
            Stat::make('Produk dengan Stok Terkecil', $lowestStockProduct ? "{$lowestStockProduct->name} ({$lowestStockProduct->stock} unit)" : 'Tidak ada produk'),
        ];
    }
}
