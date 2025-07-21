<?php

namespace App\Filament\Resources\DoorlockResource\Pages;

use App\Filament\Resources\DoorlockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoorlock extends EditRecord
{
    protected static string $resource = DoorlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
