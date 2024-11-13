<?php

namespace App\Filament\Resources\ListCategoryResource\Pages;

use App\Filament\Resources\ListCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListCategory extends EditRecord
{
    protected static string $resource = ListCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //redirect to index after create
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
