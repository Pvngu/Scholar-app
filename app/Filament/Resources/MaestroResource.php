<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Maestro;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MaestroResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MaestroResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class MaestroResource extends Resource
{
    protected static ?string $model = Maestro::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('apellido_paterno')
                    ->label('Apellido Paterno')
                    ->required(),
                TextInput::make('apellido_materno')
                    ->label('Apellido Materno')
                    ->required(),
                TextInput::make('nombres')
                    ->label('Nombres')
                    ->required(),
                Select::make('grado_estudios')
                    ->label('Grado de Estudios')
                    ->options([
                        'LIC' => 'LIC.',
                        'ING' => 'ING.',
                        'QUI' => 'QUI.',
                        'MAE' => 'MAE.',
                        'DOC' => 'DOC.',
                        'M.C.' => 'M.C.',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('rfc')
                    ->label('RFC')
                    ->required(),
                TextInput::make('curp')
                    ->label('CURP')
                    ->required(),
                TextInput::make('tarjeta_recursos_humanos')
                    ->label('Tarjeta Recursos Humanos'),
                TextInput::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->required(),
                TextInput::make('area_administrativa')
                    ->label('Área Administrativa')
                    ->required(),
                Select::make('sexo')
                    ->label('Sexo')
                    ->options([
                        'M' => 'Masculino',
                        'F' => 'Femenino',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('estado_civil')
                    ->label('Estado Civil')
                    ->options([
                        'soltero' => 'Soltero',
                        'casado' => 'Casado',
                        'divorciado' => 'Divorciado',
                        'viudo' => 'Viudo',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('lugar_nacimiento')
                    ->label('Lugar de Nacimiento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(name: 'apellido_paterno')
                    ->searchable(),
                    TextColumn::make(name: 'apellido_materno')
                        ->searchable(),
                    TextColumn::make(name: 'nombres')
                        ->searchable(),
                    TextColumn::make(name: 'grado_estudios')
                        ->searchable(),
                    TextColumn::make(name: 'rfc')
                        ->searchable(),
                    TextColumn::make(name: 'curp')
                        ->searchable(),
                    TextColumn::make(name: 'tarjeta_recursos_humanos')
                        ->searchable(),
                    TextColumn::make(name: 'fecha_nacimiento')
                        ->searchable(),
                    TextColumn::make(name: 'area_administrativa')
                        ->searchable(),
                    TextColumn::make(name: 'sexo')
                        ->searchable(),
                    TextColumn::make(name: 'estado_civil')
                        ->searchable(),
                    TextColumn::make(name: 'lugar_nacimiento')
                        ->searchable(),
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
            'index' => Pages\ListMaestros::route('/'),
            'create' => Pages\CreateMaestro::route('/create'),
            'edit' => Pages\EditMaestro::route('/{record}/edit'),
        ];
    }
}
