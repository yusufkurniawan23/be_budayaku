<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    
    protected static ?string $navigationGroup = 'Konten';
    
    protected static ?string $navigationLabel = 'Agenda Acara';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Agenda')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Agenda')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan judul agenda'),

                        Forms\Components\TextInput::make('lokasi')
                            ->label('Lokasi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan lokasi acara'),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('tanggal_mulai')
                                    ->label('Tanggal Mulai')
                                    ->required()
                                    ->format('Y-m-d')
                                    ->minDate(now())
                                    ->default(now()),

                                Forms\Components\DatePicker::make('tanggal_selesai')
                                    ->label('Tanggal Selesai')
                                    ->required()
                                    ->format('Y-m-d')
                                    ->minDate(fn (Forms\Get $get) => $get('tanggal_mulai') ?? now())
                                    ->afterOrEqual('tanggal_mulai')
                                    ->default(now()->addDays(1)),
                            ]),

                        Forms\Components\RichEditor::make('deskripsi')
                            ->label('Deskripsi Acara')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'strike', 'link', 
                                'bulletList', 'orderedList', 'redo', 'undo'
                            ])
                            ->placeholder('Berikan deskripsi lengkap tentang acara'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Agenda')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),

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
                Tables\Filters\Filter::make('upcoming')
                    ->label('Agenda Mendatang')
                    ->query(fn (Builder $query): Builder => $query->where('tanggal_mulai', '>=', now())),

                Tables\Filters\Filter::make('past')
                    ->label('Agenda Yang Lewat')
                    ->query(fn (Builder $query): Builder => $query->where('tanggal_selesai', '<', now())),

                Tables\Filters\Filter::make('ongoing')
                    ->label('Agenda Berlangsung')
                    ->query(fn (Builder $query): Builder => $query
                        ->where('tanggal_mulai', '<=', now())
                        ->where('tanggal_selesai', '>=', now())),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->modalHeading('Lihat Detail Agenda'),
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
                    ->label('Tambah Agenda Baru'),
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('tanggal_mulai', '>', now())->count() > 0
            ? 'success'
            : 'warning';
    }
}
