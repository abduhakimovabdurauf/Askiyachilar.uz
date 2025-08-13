<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammsResource\Pages;
use App\Filament\Resources\ProgrammsResource\RelationManagers;
use App\Models\Programms;
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
use Filament\Forms\Components\DatePicker;
class ProgrammsResource extends Resource
{
    protected static ?string $model = Programms::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Asosiy maʼlumotlar')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('title_uz')
                                ->label('Title (Uz)')
                                ->placeholder('Sarlavhani kiriting...')
                                ->required(),

                            TextInput::make('title_ru')
                                ->label('Tile (Ru)')
                                ->placeholder('Введите название...')
                                ->required(),

                            TextInput::make('title_en')
                                ->label('Title (En)')
                                ->placeholder('Enter title...')
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


                Section::make('from-to')
                    ->schema([
                        Grid::make(3)->schema([
                            DatePicker::make('from')
                                ->label('Qachondan')
                                ->displayFormat('d-m')
                                ->format('Y-m-d')
                                ->native(false)
                                ->closeOnDateSelection(true),

                            DatePicker::make('to')
                                ->label('Qachongacha')
                                ->displayFormat('d-m')
                                ->format('Y-m-d')
                                ->native(false)
                                ->closeOnDateSelection(true),
                        ]),
                    ]),



                Section::make('Rasm')
                    ->schema([
                        FileUpload::make('images')
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
                TextColumn::make('title_uz')
                    ->label('Title (Uz)')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('description_uz')
                    ->label('Tavsif (Uz)')
                    ->limit(50),

                TextColumn::make('from')
                    ->label('Qachondan')
                    ->date('d-m'),
                TextColumn::make('to')
                    ->label('Qachongacha')
                    ->date('d-m'),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgramms::route('/'),
            'create' => Pages\CreateProgramms::route('/create'),
            'edit' => Pages\EditProgramms::route('/{record}/edit'),
        ];
    }
}
