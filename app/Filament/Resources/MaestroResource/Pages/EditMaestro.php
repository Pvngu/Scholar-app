<?php

namespace App\Filament\Resources\MaestroResource\Pages;

use App\Filament\Resources\MaestroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaestro extends EditRecord
{
    protected static string $resource = MaestroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
