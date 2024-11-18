<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListCategoryResource\Pages;
use App\Filament\Resources\ListCategoryResource\RelationManagers;
use App\Models\ListCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListCategoryResource extends Resource
{
    protected static ?string $model = ListCategory::class;

    protected static ?string $navigationGroup = 'Product';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //input list kategori
                TextInput::make('list_kategori')
                    ->required()
                    ->placeholder('Masukkan list kategori, ex: Gaming')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //tampilkan kolom list kategori
                TextColumn::make('list_kategori')
                    ->sortable()
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListListCategories::route('/'),
            'create' => Pages\CreateListCategory::route('/create'),
            'edit' => Pages\EditListCategory::route('/{record}/edit'),
        ];
    }
}
