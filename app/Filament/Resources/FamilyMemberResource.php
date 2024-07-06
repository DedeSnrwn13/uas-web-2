<?php

namespace App\Filament\Resources;

use Closure;
use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\FamilyMember;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FamilyMemberResource\Pages;
use App\Filament\Resources\FamilyMemberResource\RelationManagers;

class FamilyMemberResource extends Resource
{
    protected static ?string $model = FamilyMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Manajemen Penduduk';

    protected static ?string $navigationLabel = 'Anggota Keluarga';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('family_id')
                            ->rules([
                                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                                    if ($get('family_id') == $get('resident_id')) {
                                        $fail("Anggota keluarga dan Penduduk tidak boleh sama");
                                    }
                                },
                            ])
                            ->relationship('family.headOfFamily', 'name')
                            ->label('Keluarga')
                            ->placeholder('Pilih keluarga')
                            ->required(),
                        Forms\Components\Select::make('resident_id')
                            ->rules([
                                fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                                    if ($get('family_id') == $get('resident_id')) {
                                        $fail("Anggota keluarga dan Penduduk tidak boleh sama");
                                    }
                                },
                            ])
                            ->relationship('resident', 'name')
                            ->label('Nama')
                            ->placeholder('Pilih anggota keluarga')
                            ->required(),
                        Forms\Components\Select::make('relationship')
                            ->label('Hubungan')
                            ->placeholder('Pilih hubungan')
                            ->options([
                                'spouse' => 'Pasangan',
                                'child' => 'Anak',
                                'parent' => 'Orang Tua',
                                'other' => 'Lainnya',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('occupation')
                            ->label('Pekerjaan')
                            ->placeholder('Input pekerjaan')
                            ->required()
                            ->maxLength(255),
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
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('relationship')
                    ->label('Hubungan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->label('Pekerjaan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('family.head_of_family')
                    ->label('Kepala Keluarga')
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
            'index' => Pages\ListFamilyMembers::route('/'),
            'create' => Pages\CreateFamilyMember::route('/create'),
            'edit' => Pages\EditFamilyMember::route('/{record}/edit'),
        ];
    }
}