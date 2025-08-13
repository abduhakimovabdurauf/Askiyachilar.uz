<?php

namespace App\Filament\Resources\HumoristsResource\Pages;

use App\Filament\Resources\HumoristsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHumorists extends EditRecord
{
    protected static string $resource = HumoristsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
