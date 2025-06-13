<?php

namespace App\Filament\Resources\AgendaResource\Pages;

use App\Filament\Resources\AgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Agenda berhasil dibuat')
            ->success()
            ->body('Agenda baru telah berhasil ditambahkan ke sistem.');
    }
}
