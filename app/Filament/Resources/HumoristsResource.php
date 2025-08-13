<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HumoristsResource\Pages;
use App\Filament\Resources\HumoristsResource\RelationManagers\ActivitiesRelationManager;
use App\Models\Humorists;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class HumoristsResource extends Resource
{
    protected static ?string $model = Humorists::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Qiziqchilar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Asosiy maʼlumotlar')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('name_uz')
                                ->label('Name (Uz)')
                                ->placeholder('Ismni kiriting...')
                                ->required(),

                            TextInput::make('name_ru')
                                ->label('Name (Ru)')
                                ->placeholder('Введите имя...')
                                ->required(),

                            TextInput::make('name_en')
                                ->label('Name (En)')
                                ->placeholder('Enter name...')
                                ->required(),
                        ]),
                    ]),

                Section::make('Tavsiflar')
                    ->schema([
                        Grid::make(3)->schema([
                            Textarea::make('description_uz')
                                ->label('Tavsif (Uz)')
                                ->rows(5)
                                ->placeholder('O‘zbekcha tavsif...'),

                            Textarea::make('description_ru')
                                ->label('Tavsif (Ru)')
                                ->rows(5)
                                ->placeholder('Описание на русском...'),

                            Textarea::make('description_en')
                                ->label('Tavsif (En)')
                                ->rows(5)
                                ->placeholder('Description in English...'),
                        ]),
                    ]),

                Section::make('Kasb')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('job_uz')
                                ->label('Kasb (Uz)')
                                ->placeholder('O‘zbekcha kasb...')
                                ->maxLength(255),

                            TextInput::make('job_ru')
                                ->label('Kasb (Ru)')
                                ->placeholder('Профессия на русском...')
                                ->maxLength(255),

                            TextInput::make('job_en')
                                ->label('Kasb (En)')
                                ->placeholder('Profession in English...')
                                ->maxLength(255),
                        ]),
                    ]),


                Section::make('Rasm')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Image')
                            ->directory('humorists')
                            ->image()
                            ->imagePreviewHeight('150')
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->square()
                    ->size(60)
                    ->alignCenter(),

                TextColumn::make('name_uz')
                    ->label('Name (Uz)')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(20),

                TextColumn::make('job_uz')
                    ->label('Kasb (Uz)')
                    ->limit(25)
                    ->tooltip(fn ($record) => $record->job_uz),

                TextColumn::make('description_uz')
                    ->label('Tavsif (Uz)')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->description_uz),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('image')
                    ->label('Rasm holati')
                    ->trueLabel('Rasm bor')
                    ->falseLabel('Rasm yo‘q')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('image'),
                        false: fn ($query) => $query->whereNull('image')
                    ),
            ])
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

    public static function getRelations(): array
    {
        return [
            ActivitiesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHumorists::route('/'),
            'create' => Pages\CreateHumorists::route('/create'),
            'edit' => Pages\EditHumorists::route('/{record}/edit'),
            'view' => Pages\ViewHumorists::route('/{record}'),
        ];
    }
}
