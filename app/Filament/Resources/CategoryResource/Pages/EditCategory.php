<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Kategori'),
            Actions\ViewAction::make()
                ->label('Pratinjau')
                ->modalContent(fn ($record) => view('filament.resources.category-resource.modal-content', ['record' => $record])),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Kategori berhasil diperbarui')
            ->success()
            ->body('Perubahan pada data kategori telah berhasil disimpan.');
    }
}