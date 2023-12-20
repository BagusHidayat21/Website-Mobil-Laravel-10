<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewaResource\Pages;
use App\Filament\Resources\SewaResource\RelationManagers;
use App\Models\Sewa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SewaResource extends Resource
{
    protected static ?string $model = Sewa::class;
    protected static ?string $navigationLabel = 'Data Sewa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('car_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telp')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.'),
                Forms\Components\DatePicker::make('Sewa')
                    ->required(),
                Forms\Components\DatePicker::make('Kembali')
                    ->required(),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_pembayaran')
                ->options([
                    'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                    'Pembayaran Selesai' => 'Pembayaran Selesai',
                ]),
                Forms\Components\Select::make('status_pengembalian')
                ->options([
                    'Disewa' => 'Disewa',
                    'Dikembalikan' => 'Dikembalikan',
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telp')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sewa')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kembali')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_pembayaran')
                ->searchable(),
                Tables\Columns\TextColumn::make('status_pengembalian')
                ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSewas::route('/'),
            'create' => Pages\CreateSewa::route('/create'),
            'edit' => Pages\EditSewa::route('/{record}/edit'),
        ];
    }
}
