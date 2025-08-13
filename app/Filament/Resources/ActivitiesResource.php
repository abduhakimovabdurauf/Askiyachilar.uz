<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivitiesResource\Pages;
use App\Models\Activities;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;

class ActivitiesResource extends Resource
{
    protected static ?string $model = Activities::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Qiziqchilarga oid maʼlumotlar';
    protected static ?string $navigationLabel = 'Faoliyat';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([ // 2 ustunli grid
                    TextInput::make('year')
                        ->label('Yili')
                        ->numeric()
                        ->required()
                        ->minValue(1800)
                        ->maxValue(date('Y'))
                        ->placeholder('Masalan: 2024'),

                    Select::make('humorist_id')
                        ->relationship('humorist', 'name_uz')
                        ->label('Qiziqchi')
                        ->preload()
                        ->searchable()
                        ->required()
                        ->placeholder('Qiziqchini tanlang'),
                ]),

                Grid::make(3)->schema([
                    Textarea::make('description_uz')
                        ->label('Tavsif (Uz)')
                        ->rows(4)
                        ->placeholder('O‘zbekcha tavsif kiriting...'),

                    Textarea::make('description_ru')
                        ->label('Tavsif (Ru)')
                        ->rows(4)
                        ->placeholder('Ruscha tavsif kiriting...'),

                    Textarea::make('description_en')
                        ->label('Tavsif (En)')
                        ->rows(4)
                        ->placeholder('Inglizcha tavsif kiriting...'),
                ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('year')
                    ->sortable()
                    ->label('Yili')
                    ->alignCenter(),

                TextColumn::make('description_uz')
                    ->label('Tavsif (Uz)')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description_uz),

                TextColumn::make('humorist.name_uz')
                    ->label('Qiziqchi')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i')
                    ->label('Yaratilgan vaqti'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivities::route('/create'),
            'edit' => Pages\EditActivities::route('/{record}/edit'),
            'view' => Pages\ViewActivities::route('/{record}'),
        ];
    }
}
