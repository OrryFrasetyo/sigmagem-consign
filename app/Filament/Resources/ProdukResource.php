<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;

class ProdukResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')
                    ->required()
                    ->label('Nama Produk'),
                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'nama_kategori')
                    ->searchable()
                    ->label('List Kategori'),
                TextInput::make('harga')
                    ->required()
                    ->label('Harga')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $feePenjualan = $state * 0.12; // Menghitung 12% dari harga
                        $set('fee_penjualan', $feePenjualan); // nilai fee_penjualan
                        $set('dana_diterima', $state - $feePenjualan); // nilai dana_diterima
                    }),
                TextInput::make('fee_penjualan')
                    ->required()
                    ->label('Fee Penjualan')
                    ->disabled(),
                TextInput::make('dana_diterima')
                    ->required()
                    ->label('Dana Diterima')
                    ->disabled(),
                TextInput::make('berat')
                    ->required()
                    ->label('Berat'),
                TextInput::make('stok')
                    ->required()
                    ->label('Stok'),
                TextInput::make('panjang')
                    ->required()
                    ->label('Panjang'),
                TextInput::make('lebar')
                    ->required()
                    ->label('Lebar'),
                TextInput::make('tinggi')
                    ->required()
                    ->label('Tinggi'),
                Checkbox::make('packing_kayu')
                    ->label('Packing Kayu'),
                Checkbox::make('asuransi')
                    ->label('Asuransi'),
                FileUpload::make('sisi_depan')
                    ->required()
                    ->label('Sisi Depan'),
                FileUpload::make('sisi_kanan')
                    ->required()
                    ->label('Sisi Kanan/Kiri'),
                FileUpload::make('sisi_atas')
                    ->required()
                    ->label('Sisi Atas/Bawah'),
                FileUpload::make('lainnya')
                    ->required()
                    ->label('Lainnya'),
                Select::make('kondisi_barang')
                    ->options([
                        'Brand New In Box' => 'Brand New In Box',
                        'Brand New Open Box' => 'Brand New Open Box',
                        'Very Good Condition' => 'Very Good Condition',
                        'Good Condition' => 'Good Condition',
                        'Judge by Pict' => 'Judge By Pict',
                    ])
                    ->native(false),
                Select::make('garansi')
                    ->options([
                        'on' => 'On',
                        'off' => 'Off',
                    ])
                    ->native(false),
                TextInput::make('lama_pemakaian')
                    ->label('Lama Pemakaian'),
                TextInput::make('tangan_ke')
                    ->required()
                    ->label('Tanggal ke'),
                TextInput::make('waktu_pembelian')
                    ->label('Waktu Pembelian'),
                TextInput::make('Minus')
                    ->required()
                    ->label('Minus'),
                TextInput::make('kelengkapan')
                    ->label('Kelengkapan'),
                //wireless/wired
                Select::make('wireless')
                    ->options([
                        'wireless' => 'Wireless',
                        'wired' => 'Wired',
                    ])
                    ->native(false),
                TextInput::make('suara_aman')
                    ->required()
                    ->label('Suara Aman?'),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nama_produk')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Produk'),
                TextColumn::make('category.nama_kategori')
                    ->sortable()
                    ->searchable()
                    ->label('Kategori'),
                TextColumn::make('harga')
                    ->sortable()
                    ->searchable()
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('fee_penjualan')
                    ->sortable()
                    ->searchable()
                    ->label('Fee Penjualan')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('dana_diterima')
                    ->sortable()
                    ->searchable()
                    ->label('Dana Diterima')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
                TextColumn::make('berat')
                    ->sortable()
                    ->searchable()
                    ->label('Berat (kg)'),
                TextColumn::make('stok')
                    ->sortable()
                    ->searchable()
                    ->label('Stok'),
                TextColumn::make('panjang')
                    ->sortable()
                    ->searchable()
                    ->label('Panjang (cm)'),
                TextColumn::make('lebar')
                    ->sortable()
                    ->searchable()
                    ->label('Lebar (cm)'),
                TextColumn::make('tinggi')
                    ->sortable()
                    ->searchable()
                    ->label('Tinggi (cm)'),
                TextColumn::make('packing_kayu')
                    ->sortable()
                    ->searchable()
                    ->label('Packing Kayu'),
                TextColumn::make('asuransi')
                    ->sortable()
                    ->searchable()
                    ->label('Asuransi'),
                ImageColumn::make('sisi_depan')
                    ->label('Sisi Depan'),
                ImageColumn::make('sisi_kanan')
                    ->label('Sisi Kanan/Kiri'),
                ImageColumn::make('sisi_atas')
                    ->label('Sisi Atas/Bawah'),
                ImageColumn::make('lainnya')
                    ->label('Sisi Lainnya'),
                TextColumn::make('kondisi_barang')
                    ->sortable()
                    ->searchable()
                    ->label('Kondisi Barang'),
                TextColumn::make('garansi')
                    ->sortable()
                    ->searchable()
                    ->label('Garansi'),
                TextColumn::make('lama_pemakaian')
                    ->sortable()
                    ->searchable()
                    ->label('Lama Pemakaian'),
                TextColumn::make('tangan_ke')
                    ->sortable()
                    ->searchable()
                    ->label('Tangan Ke'),
                TextColumn::make('waktu_pembelian')
                    ->sortable()
                    ->searchable()
                    ->label('Waktu Pembelian'),
                TextColumn::make('minus')
                    ->sortable()
                    ->searchable()
                    ->label('Minus'),
                TextColumn::make('kelengkapan')
                    ->sortable()
                    ->searchable()
                    ->label('Kelengkapan'),
                TextColumn::make('asuransi')
                    ->sortable()
                    ->searchable()
                    ->label('Asuransi'),
                TextColumn::make('wireless')
                    ->sortable()
                    ->searchable()
                    ->label('Wireless'),
                TextColumn::make('suara_aman')
                    ->sortable()
                    ->searchable()
                    ->label('Suara Aman'),
                TextColumn::make('Tanggal Publish')
                    ->sortable()
                    ->searchable()
                    ->label('created_at'),


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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
