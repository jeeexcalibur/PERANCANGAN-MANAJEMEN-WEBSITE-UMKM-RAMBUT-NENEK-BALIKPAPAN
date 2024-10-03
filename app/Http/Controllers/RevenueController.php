<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Sesuaikan dengan model yang kamu gunakan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RevenueController extends Controller
{
    public function export()
    {
        // Ambil data pendapatan
        $revenues = Transaction::all(); // Sesuaikan query jika diperlukan

        // Buat file CSV
        $csvFileName = 'revenues_' . now()->format('Ymd') . '.csv';
        $handle = fopen('php://output', 'w');

        // Set header untuk file CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csvFileName . '"');

        // Tulis header kolom
        fputcsv($handle, ['ID', 'Tanggal', 'Total Pendapatan', 'Pelanggan', 'Produk Terlaris', 'Produk Tersedikit Terjual']);

        // Tulis data
        foreach ($revenues as $revenue) {
            fputcsv($handle, [
                $revenue->id,
                $revenue->created_at,
                $revenue->total,
                $revenue->user->name, // Pastikan relasi user ada
                $revenue->most_sold_product,
                $revenue->least_sold_product,
            ]);
        }

        fclose($handle);
        exit; // Hentikan script setelah menulis file CSV
    }
}
