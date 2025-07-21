<?php

namespace App\Filament\Resources\DoorlockResource\Pages;

use App\Filament\Resources\DoorlockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDoorlocks extends ListRecords
{
    protected static string $resource = DoorlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
