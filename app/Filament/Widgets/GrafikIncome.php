<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class GrafikIncome extends ChartWidget
{
    protected static ?string $heading = 'Pemasukan';
    protected static string $color = 'success';
    protected array|string|int $columnSpan = 1;

    protected function getData(): array
    {

      $user = Auth::user();

    // Jika user belum punya transaksi -> tampilkan chart kosong
     if ($user->transactions()->count() === 0) {
        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan',
                    'data' => [],
                ],
            ],
            'labels' => [],
        ];
    }

$data = Trend::model(Transaction::class)
        ->query(Transaction::query()->incomes())
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perDay()
        ->sum('amount');

    return [
        'datasets' => [
            [
                'label' => 'Blog posts',
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