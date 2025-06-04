<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
   { 
    $user = Auth::user();
       if ($user->transactions()->count() === 0) {
       
        return [
            Stat::make('Total Pemasukan', 0)
                ->description('Belum ada data')
                ->color('gray'),
            Stat::make('Total Pengeluaran', 0)
                ->description('Belum ada data')
                ->color('gray'),
            Stat::make('Selisih', 0)
                ->description('Belum ada data')
                ->color('gray'),
        ];
       }

        $pemasukan = Transaction::incomes()->sum('amount');
        $pengeluaran = Transaction::expenses()->sum('amount');
        return[
            Stat::make('Total Pemasukan', $pemasukan)
                ->descriptionIcon('heroicon-marrow-trending-up')
                ->color('Succes'),
            Stat::make('Total Pengeluaran', $pengeluaran)
                ->descriptionIcon('heroicon-marrow-trending-up')
                ->color('danger'),
            Stat::make('Selisih', $pemasukan - $pengeluaran)
                ->descriptionIcon('heroicon-m-scale')
                ->color($pemasukan >= $pengeluaran ? 'succes' : 'danger'),

        ];
   }

}


