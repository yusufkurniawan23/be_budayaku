<?php

namespace App\Filament\Resources\SenimanResource\Pages;

use App\Filament\Resources\SenimanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateSeniman extends CreateRecord
{
    protected static string $resource = SenimanResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Seniman berhasil dibuat')
            ->success()
            ->body('Data seniman baru telah berhasil ditambahkan ke sistem.');
    }
}