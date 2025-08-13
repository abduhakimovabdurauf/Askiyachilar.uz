<?php

namespace App\Filament\Resources\ProgrammsResource\Pages;

use App\Filament\Resources\ProgrammsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramms extends EditRecord
{
    protected static string $resource = ProgrammsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
