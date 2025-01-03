<?php

namespace App\Filament\Widgets;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Menghitung total fee_penjualan
        // $totalFeePenjualan = Transaction::join('products', 'transactions.product_id', '=', 'products.id')
        // ->sum('products.fee_penjualan');
        $totalFeePenjualan = Transaction::sum(DB::raw('(total_harga - 30000) * 0.12'));
        $activeUser = Customer::count();
        $activeOrder = Transaction::count();
        return [
            Stat::make('Total Fee Penjualan', 'Rp ' . number_format($totalFeePenjualan, 2, ',', '.'))
                ->description('kenaikan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Jumlah User', $activeUser)
                ->description('kenaikan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Jumlah Order', $activeOrder)
                ->description('kenaikan')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
