<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Tables\Columns;
use Filament\Tables;
use App\Models\Maestro;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Departamento;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use App\Exports\DepartamentosExport;
use Filament\Support\Enums\MaxWidth;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\DepartamentoExporter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DepartamentoResource\Pages;
use App\Filament\Resources\DepartamentoResource\RelationManagers;

class DepartamentoResource extends Resource
{
    protected static ?string $model = Departamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre_departamento')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nombre_corto')
                    ->label('Nombre Corto')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre_departamento')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nombre_corto'),
                TextColumn::make('maestros_count')
                    ->label('Personal')
                    ->sortable()
                    ->counts('maestros'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // ExportAction::make()
                //     ->exporter(DepartamentoExporter::class)
                //     ->form([
                //         Forms\Components\Select::make('condition')
                //             ->label('condicion')
                //             ->options([
                //                 'all' => 'All',
                //                 'active' => 'Active',
                //                 'inactive' => 'Inactive',
                //             ])
                //             ->default('all'),
                //     ]),
                Action::make('export')
                    ->label('Exportar departamentos')
                    ->outlined()
                    ->modalHeading('Exportar departamentos')
                    ->modalWidth(MaxWidth::ExtraLarge)
                    ->form([
                        Forms\Components\Select::make('condition')
                            ->label('Condicion')
                            ->required()
                            ->options([
                                'grado_estudios' => 'Grado de Estudio',
                                'lugar_nacimiento' => 'Lugar Nacimiento',
                            ])
                            ->native(false)
                            ])
                    ->modalSubmitActionLabel('Exportar')
                    ->action(function (array $data) {
                        return Excel::download(new DepartamentosExport($data['condition']), 'departamentos.xlsx');
                    }),
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
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamento::route('/create'),
            'edit' => Pages\EditDepartamento::route('/{record}/edit'),
        ];
    }

    protected function generateExportFile(string $condition) {
        error_log($condition);
    }
}
