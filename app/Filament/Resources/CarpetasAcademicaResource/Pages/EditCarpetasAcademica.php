<?php

namespace App\Filament\Resources\CarpetasAcademicaResource\Pages;

use App\Filament\Resources\CarpetasAcademicaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarpetasAcademica extends EditRecord
{
    protected static string $resource = CarpetasAcademicaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
