<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudayaResource\Pages;
use App\Models\Budaya;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class BudayaResource extends Resource
{
    protected static ?string $model = Budaya::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Budaya';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Budaya')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Kategori')
                            ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->required(),

                        Forms\Components\TextInput::make('nama_objek')
                            ->label('Nama Objek Budaya')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal')
                            ->required()
                            ->format('Y-m-d')
                            ->default(now()),

                        SpatieMediaLibraryFileUpload::make('foto')
                            ->collection('foto')
                            ->label('Foto Budaya')
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(2)
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('450')
                            ->maxSize(5120)
                            ->required()
                            ->hint('Format gambar: JPG, PNG, WEBP. Ukuran max: 5MB')
                            ->helperText('Disarankan gambar dengan rasio 16:9'),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike', 'link',
                                'bulletList', 'orderedList', 'redo', 'undo'
                            ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('foto')
                    ->collection('foto')
                    ->label('Foto')
                    ->size(80)
                    ->square(),

                Tables\Columns\TextColumn::make('nama_objek')
                    ->label('Nama Objek')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Cagar Budaya' => 'warning',
                        'Cagar Alam' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->html()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = strip_tags($column->getState());
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->multiple(),

                Tables\Filters\Filter::make('cagar_budaya')
                    ->label('Cagar Budaya')
                    ->query(fn (Builder $query): Builder => $query->whereHas('category', fn ($q) => $q->where('name', 'Cagar Budaya'))),

                Tables\Filters\Filter::make('cagar_alam')
                    ->label('Cagar Alam')
                    ->query(fn (Builder $query): Builder => $query->whereHas('category', fn ($q) => $q->where('name', 'Cagar Alam'))),

                Tables\Filters\Filter::make('tahun_ini')
                    ->label('Tahun Ini')
                    ->query(fn (Builder $query): Builder => $query->whereYear('tanggal', now()->year)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Detail Budaya')
                    ->modalWidth('4xl')
                    ->modalContent(function (Budaya $record) {
                        return view('filament.resources.budaya-resource.modal-content', [
                            'record' => $record
                        ]);
                    }),

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Budaya')
                    ->modalDescription('Apakah Anda yakin ingin menghapus data budaya ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->modalHeading('Hapus Budaya Terpilih')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua budaya yang dipilih? Tindakan ini tidak dapat dibatalkan.'),

                    Tables\Actions\BulkAction::make('exportPDF')
                        ->label('Export PDF')
                        ->icon('heroicon-o-document-arrow-down')
                        ->color('success')
                        ->action(function (array $records) {
                            \Filament\Notifications\Notification::make()
                                ->title(count($records) . ' budaya siap diexport')
                                ->success()
                                ->send();
                        })
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Budaya Baru')
                    ->icon('heroicon-o-plus'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBudayas::route('/'),
            'create' => Pages\CreateBudaya::route('/create'),
            'edit' => Pages\EditBudaya::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $cagarBudayaCount = static::getModel()::whereHas('category', fn ($q) => $q->where('name', 'Cagar Budaya'))->count();
        $cagarAlamCount = static::getModel()::whereHas('category', fn ($q) => $q->where('name', 'Cagar Alam'))->count();

        if ($cagarBudayaCount > 0 && $cagarAlamCount > 0) {
            return 'success';
        } elseif ($cagarBudayaCount > 0 || $cagarAlamCount > 0) {
            return 'warning';
        } else {
            return 'danger';
        }
    }
}