<?php

namespace App\Filament\Resources\BudayaResource\Pages;

use App\Filament\Resources\BudayaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateBudaya extends CreateRecord
{
    protected static string $resource = BudayaResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Budaya berhasil dibuat')
            ->success()
            ->body('Data budaya baru telah berhasil ditambahkan ke sistem.');
    }
}