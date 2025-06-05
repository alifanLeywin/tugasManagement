<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


class GrafikExpense extends ChartWidget
{
    protected static ?string $heading = 'Pengeluaran';
    protected static string $color = 'warning';
    // Perkecil chart agar lebih kecil, misal columnSpan 2 (1/6 grid)
    protected array|string|int $columnSpan = 1;

    protected function getData(): array
    {
        $user = Auth::user();

    // Jika user belum punya transaksi -> tampilkan chart kosong
     if ($user->transactions()->count() === 0) {
        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran',
                    'data' => [],
                ],
            ],
            'labels' => [],
        ];
    }
    $data = Trend::model(Transaction::class)
        ->query(Transaction::query()->expenses())
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perDay()
        ->sum('amount');

    return [
        'datasets' => [
            [
                'label' => 'Pengeluaran',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    
    

}