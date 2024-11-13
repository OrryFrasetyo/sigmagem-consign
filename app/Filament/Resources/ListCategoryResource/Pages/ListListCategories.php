<?php

namespace App\Filament\Resources\ListCategoryResource\Pages;

use App\Filament\Resources\ListCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListCategories extends ListRecords
{
    protected static string $resource = ListCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
