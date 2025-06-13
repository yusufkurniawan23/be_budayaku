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
                            ->maxLength(255)
                            ->placeholder('Masukkan nama objek budaya'),
                            
                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal')
                            ->required()
                            ->format('Y-m-d')
                            ->default(now()),

                        SpatieMediaLibraryFileUpload::make('foto')
                            ->collection('foto')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->imageEditorViewportWidth('1200')
                            ->imageEditorViewportHeight('675')
                            ->maxSize(5120) // 5MB
                            ->hint('Format gambar: JPG, PNG, WEBP. Ukuran max: 5MB')
                            ->helperText('Disarankan gambar dengan rasio 16:9')
                            ->panelAspectRatio('16:9')
                            ->panelLayout('integrated')
                            ->openable()
                            ->downloadable(),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike', 'link', 
                                'bulletList', 'orderedList', 'redo', 'undo'
                            ])
                            ->placeholder('Berikan deskripsi lengkap tentang objek budaya'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_objek')
                    ->label('Nama Objek')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),
                    
                SpatieMediaLibraryImageColumn::make('foto')
                    ->label('Foto')
                    ->collection('foto')
                    ->conversion('thumb')
                    ->circular(false)
                    ->size(80)
                    ->extraImgAttributes(['loading' => 'lazy']),
                    
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
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Lihat Detail Budaya')
                    ->modalContent(fn (Budaya $record) => view('filament.resources.budaya-resource.modal-content', ['record' => $record]))
                    ->modalWidth('md'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Budaya Baru'),
            ]);
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