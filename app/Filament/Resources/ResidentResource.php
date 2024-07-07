<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use App\Models\Resident;
use Filament\Forms\Form;
use Filament\Tables\Table;
use PhpParser\Node\Stmt\Label;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\ResidentExporter;
use App\Filament\Resources\ResidentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ResidentResource\RelationManagers;

class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Manajemen Penduduk';

    protected static ?string $navigationLabel = 'Penduduk';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->placeholder('Input nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->placeholder('Pilih jenis kelamin')
                            ->options([
                                'male' => 'Laki-Laki',
                                'female' => 'Perempuan',
                            ])
                            ->required(),
                        Forms\Components\DatePicker::make('birthdate')
                            ->label('Tanggal Lahir')
                            ->placeholder('Input tanggal lahir')
                            ->required(),
                        Forms\Components\TextInput::make('birthplace')
                            ->label('Tempat Lahir')
                            ->placeholder('Input tempat lahir')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->label('Alamat')
                            ->placeholder('Input alamat')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('No HP')
                            ->placeholder('Input no handphone')
                            ->required()
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                            ->maxLength(15),
                        Forms\Components\Select::make('life_status')
                            ->label('Status Kehidupan')
                            ->placeholder('Pilih status kehidupan')
                            ->options([
                                'hidup' => 'Hidup',
                                'meninggal' => 'Meninggal',
                            ])
                            ->live()
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_death')
                            ->label('Meninggal Pada')
                            ->placeholder('Meninggal pada')
                            ->nullable()
                            ->displayFormat('Y-m-d')
                            ->visible(fn (Get $get): bool => $get('life_status') == 'meninggal')
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birthplace')
                    ->label('Tempat Lahir')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No HP')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age_category')
                    ->Label('Kategori Usia')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_death')
                    ->date()
                    ->visible(fn (): bool => 'life_status' == 'meninggal')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Aksi oleh')
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
                SelectFilter::make('life_status')
                    ->options([
                        'hidup' => 'Hidup',
                        'meninggal' => 'Meninggal',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ResidentExporter::class)
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
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
