<?php

namespace App\Filament\Resources\HumoristSResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ActivitiesRelationManager extends RelationManager
{
    protected static string $relationship = 'activities';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('description_uz')
                    ->label('Description (UZ)')
                    ->required(),

                Forms\Components\Textarea::make('description_ru')
                    ->label('Description (RU)'),

                Forms\Components\Textarea::make('description_en')
                    ->label('Description (EN)'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('description_uz')->limit(50),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
