<?php

namespace App\Filament\Resources\SenimanResource\Pages;

use App\Filament\Resources\SenimanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditSeniman extends EditRecord
{
    protected static string $resource = SenimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Seniman'),
            Actions\ViewAction::make()
                ->label('Pratinjau')
                ->modalContent(fn ($record) => view('filament.resources.seniman-resource.modal-content', ['record' => $record])),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Seniman berhasil diperbarui')
            ->success()
            ->body('Perubahan pada data seniman telah berhasil disimpan.');
    }
}