<?php

namespace App\Filament\Resources\BudayaResource\Pages;

use App\Filament\Resources\BudayaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditBudaya extends EditRecord
{
    protected static string $resource = BudayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Budaya'),
            Actions\ViewAction::make()
                ->label('Pratinjau'),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Budaya berhasil diperbarui')
            ->success()
            ->body('Perubahan pada data budaya telah berhasil disimpan.');
    }
}