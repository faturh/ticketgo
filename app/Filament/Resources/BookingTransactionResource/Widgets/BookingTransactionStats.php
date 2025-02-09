<?php

namespace App\Filament\Resources\BookingTransactionResource\Widgets;

use App\Models\BookingTransaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingTransactionStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTransactions = BookingTransaction::count();
        $approvedTransactions = BookingTransaction::where('is_paid', true)->count();
        $notapprovedTransactions = BookingTransaction::where('is_paid', false)->count();
        $totalRevenue = BookingTransaction::where('is_paid', true)->sum('total_amount');
        
        return [
            //
        Stat::make('Total Transaction', $totalTransactions)
            ->description('All transactions')
            ->descriptionIcon('heroicon-o-currency-dollar'),

        Stat::make('Approved transactions', $approvedTransactions)
            ->description('Approved transactions')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success'),

        Stat::make('Not approved transactions', $notapprovedTransactions)
            ->description('Not approved transactions')
            ->descriptionIcon('heroicon-o-x-circle')
            ->color('danger'),

        Stat::make('Total Revenue','IDR '. number_format($totalRevenue))
            ->description('Revenue from approved transactions')
            ->descriptionIcon('heroicon-o-check-circle')
            ->color('success'),
        ];
    }
}
