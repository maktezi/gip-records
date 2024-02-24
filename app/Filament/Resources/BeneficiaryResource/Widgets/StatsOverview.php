<?php

namespace App\Filament\Resources\BeneficiaryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Beneficiary;
use App\Models\Office;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total of', Office::all()->count())
                ->description('Offices'),
            Card::make('Total of', Beneficiary::all()->count())
                ->description('Beneficiaries'),
        ];
    }
}
