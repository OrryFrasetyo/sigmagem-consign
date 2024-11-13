<?php

namespace App\Filament\Resources\ListCategoryResource\Pages;

use App\Filament\Resources\ListCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateListCategory extends CreateRecord
{
    protected static string $resource = ListCategoryResource::class;

    //redirect to index after create
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
