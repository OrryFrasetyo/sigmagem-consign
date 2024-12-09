<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationGroup = 'Order';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('customer.full_name')
                    ->sortable()
                    ->searchable()
                    ->label('Nama User'),
                TextColumn::make('product.nama_produk')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Produk'),
                TextColumn::make('quantity')
                    ->sortable()
                    ->searchable()
                    ->label('Jumlah'),
                TextColumn::make('product.harga')
                    ->sortable()
                    ->searchable()
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('product.fee_penjualan')
                    ->sortable()
                    ->searchable()
                    ->label('Fee Penjualan')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('created_at')
                    ->label('Tanggal Order')
                //status order

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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCart::route('/create'),
            'edit' => Pages\EditCart::route('/{record}/edit'),
        ];
    }
}
