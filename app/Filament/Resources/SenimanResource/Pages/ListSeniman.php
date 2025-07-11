<?php

namespace App\Filament\Resources\SenimanResource\Pages;

use App\Filament\Resources\SenimanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeniman extends ListRecords
{
    protected static string $resource = SenimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Seniman'),
        ];
    }
}