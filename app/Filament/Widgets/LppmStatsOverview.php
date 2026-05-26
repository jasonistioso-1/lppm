<?php

namespace App\Filament\Widgets;

use App\Models\Lecturer;
use App\Models\News;
use App\Models\Publication;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LppmStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Akademisi / Dosen', Lecturer::count())
                ->description('Dosen aktif pengampu Tridharma')
                ->descriptionIcon('heroicon-m-users')
                ->chart([7, 4, 10, 3, 15, 4, 17])
                ->color('primary'),
            Stat::make('Total Jurnal & Publikasi', Publication::count())
                ->description('Jurnal resmi, prosiding & artikel')
                ->descriptionIcon('heroicon-m-book-open')
                ->chart([3, 5, 8, 4, 9, 12, 15])
                ->color('success'),
            Stat::make('Total Berita Terbaru', News::count())
                ->description('Berita dan pengumuman aktif')
                ->descriptionIcon('heroicon-m-newspaper')
                ->chart([2, 6, 3, 5, 8, 4, 6])
                ->color('warning'),
        ];
    }
}
