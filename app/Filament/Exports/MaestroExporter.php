<?php

namespace App\Filament\Exports;

use App\Models\Maestro;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MaestroExporter extends Exporter
{
    protected static ?string $model = Maestro::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('apellido_paterno'),
            ExportColumn::make('apellido_materno'),
            ExportColumn::make('nombres'),
            ExportColumn::make('grado_estudios'),
            ExportColumn::make('rfc'),
            ExportColumn::make('curp'),
            ExportColumn::make('tarjeta_recursos_humanos'),
            ExportColumn::make('fecha_nacimiento'),
            ExportColumn::make('departamento.nombre_departamento'),
            ExportColumn::make('sexo'),
            ExportColumn::make('estado_civil'),
            ExportColumn::make('lugar_nacimiento'),
            ExportColumn::make('fecha_ingreso'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Tabla de maestros ha sido exportada satisfactoriamente ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exportados.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' fallo en la exportacion.';
        }

        return $body;
    }
}
