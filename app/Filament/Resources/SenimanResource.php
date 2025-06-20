<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SenimanResource\Pages;
use App\Models\Seniman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class SenimanResource extends Resource
{
    protected static ?string $model = Seniman::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Seniman';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Seniman')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Seniman')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('judul')
                            ->label('Keahlian / Judul')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Tari Kontemporer Jawa'),

                        Forms\Components\TextInput::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('nomor')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(20),

                        SpatieMediaLibraryFileUpload::make('foto')
                            ->collection('foto')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->required()
                            ->maxSize(5120)
                            ->panelAspectRatio('1:1')
                            ->panelLayout('integrated'),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike', 'link',
                                'bulletList', 'orderedList', 'redo', 'undo'
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('foto')
                    ->collection('foto')
                    ->label('Foto')
                    ->circular()
                    ->size(60),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Keahlian')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor')
                    ->label('Nomor Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('tari')
                    ->label('Seniman Tari')
                    ->query(fn (Builder $query): Builder => $query->where('judul', 'like', '%tari%')),

                Tables\Filters\Filter::make('musik')
                    ->label('Seniman Musik')
                    ->query(fn (Builder $query): Builder => $query->where('judul', 'like', '%musik%')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Detail Seniman')
                    ->modalContent(fn (Seniman $record) => view('filament.resources.seniman-resource.modal-content', ['record' => $record])),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('exportPDF')
                        ->label('Export PDF')
                        ->icon('heroicon-o-document-arrow-down')
                        ->action(function (array $records) {
                            // Implementasi export PDF disini
                            // Untuk saat ini hanya notifikasi
                            \Filament\Notifications\Notification::make()
                                ->title(count($records) . ' seniman siap diexport')
                                ->success()
                                ->send();
                        })
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Seniman Baru'),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSeniman::route('/'),
            'create' => Pages\CreateSeniman::route('/create'),
            'edit' => Pages\EditSeniman::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}