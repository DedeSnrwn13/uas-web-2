<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\HealthRecord;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HealthRecordResource\Pages;
use App\Filament\Resources\HealthRecordResource\RelationManagers;

class HealthRecordResource extends Resource
{
    protected static ?string $model = HealthRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationGroup = 'Manajemen Catatan';

    protected static ?string $navigationLabel = 'Kesehatan';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('resident_id')
                            ->label('Penduduk')
                            ->placeholder('Pilih penduduk')
                            ->relationship('resident', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('health_issue')
                            ->label('Masalah Kesehatan')
                            ->placeholder('Input masalah kesehatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('health_description')
                            ->label('Deskripsi Kesehatan')
                            ->placeholder('Input deskripsi kesehatan')
                            ->required(),
                        Forms\Components\DatePicker::make('recorded_at')
                            ->label('Dicatat pada')
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->state(
                        static function (HasTable $livewire, stdClass $rowLoop): string {
                            return (string) (
                                $rowLoop->iteration +
                                ($livewire->getTableRecordsPerPage() * (
                                    $livewire->getTablePage() - 1
                                ))
                            );
                        }
                    ),
                Tables\Columns\TextColumn::make('resident.name')
                    ->label('Penduduk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('health_issue')
                    ->label('Masalah Kesehatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('health_description')
                    ->label('Deskripsi Kesehatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('recorded_at')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate pada')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListHealthRecords::route('/'),
            'create' => Pages\CreateHealthRecord::route('/create'),
            'edit' => Pages\EditHealthRecord::route('/{record}/edit'),
        ];
    }
}