<?php

namespace App\Filament\Resources\HumoristsResource\Pages;

use App\Filament\Resources\HumoristsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ViewHumorists extends ViewRecord
{
    protected static string $resource = HumoristsResource::class;
}
