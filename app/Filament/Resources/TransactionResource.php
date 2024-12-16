<?php

namespace App\Filament\Resources;

use App\Enums\ProductPayment;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-s-document-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship(name: 'product', titleAttribute: 'nama_produk')
                    ->disabled()
                    ->label('Nama Produk'),
                TextInput::make('quantity')
                    ->disabled()
                    ->label('Jumlah Produk'),
                FileUpload::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->disk('public')
                    ->visibility('public')
                    ->downloadable()
                    ->previewable()
                    ->directory('bukti_pembayaran'),

                Select::make('status_pembayaran')
                    ->options([
                        'Tertunda' => 'Tertunda',
                        'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                        'Sukses' => 'Sukses',
                        'Gagal' => 'Gagal',
                    ])
                    ->required()
                    ->native(false)
                    ->label('Status Pembayaran'),
                Select::make('status_produk')
                    ->options([
                        'Belum Diproses' => 'Belum Diproses',
                        'Dikemas' => 'Dikemas',
                        'Diproses' => 'Diproses',
                        'Dikirim' => 'Dikirim',
                        'Diterima' => 'Diterima',
                        'Pesanan Selesai' => 'Pesanan Selesai',
                    ])
                    ->required()
                    ->native(false)
                    ->label('Status Produk'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.nama_produk')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Produk'),
                TextColumn::make('quantity')
                    ->sortable()
                    ->searchable()
                    ->label('Jumlah Produk'),
                TextColumn::make('product.harga')
                    ->sortable()
                    ->searchable()
                    ->label('Harga Produk')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('harga_ongkir')
                    ->sortable()
                    ->searchable()
                    ->label('Harga Ongkos Kirim')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('total_harga')
                    ->sortable()
                    ->searchable()
                    ->label('Total Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('product.fee_penjualan')
                    ->sortable()
                    ->searchable()
                    ->label('Fee Penjualan')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('product.dana_diterima')
                    ->sortable()
                    ->searchable()
                    ->label('Dana Diterima')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran'),
                TextColumn::make('alamat.alamat')
                    ->sortable()
                    ->searchable()
                    ->label('Alamat Jalan'),
                TextColumn::make('alamat.kecamatan')
                    ->sortable()
                    ->searchable()
                    ->label('Alamat Kecamatan'),
                TextColumn::make('alamat.kota')
                    ->sortable()
                    ->searchable()
                    ->label('Alamat Kota'),
                TextColumn::make('alamat.provinsi')
                    ->sortable()
                    ->searchable()
                    ->label('Alamat Provinsi'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->searchable()
                    ->label('Tanggal Pembelian')
                    ->formatStateUsing(function ($state) {
                        return \Carbon\Carbon::parse($state)->translatedFormat('d-m-Y');
                    }),
                TextColumn::make('status_pembayaran')
                    ->sortable()
                    ->searchable()
                    ->label('Status Pembayaran')
                    ->badge(),
                TextColumn::make('status_produk')
                    ->sortable()
                    ->searchable()
                    ->label('Status Produk')
                    ->badge(),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
