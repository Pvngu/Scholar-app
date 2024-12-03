<?php

namespace App\Filament\Exports;

use App\Models\Departamento;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Builder;

class DepartamentoExporter extends Exporter
{
    protected static ?string $model = Departamento::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nombre_departamento'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Departamentos ha sido exportado con ' . number_format($export->successful_rows) . ' ' . str('fila')->plural($export->successful_rows) . ' exportadas.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('fila')->plural($failedRowsCount) . ' fallado en la exportacion.';
        }

        return $body;
    }
}
