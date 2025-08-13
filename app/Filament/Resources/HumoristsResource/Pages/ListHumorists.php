<?php

namespace App\Filament\Resources\HumoristsResource\Pages;

use App\Filament\Resources\HumoristsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHumorists extends ListRecords
{
    protected static string $resource = HumoristsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
