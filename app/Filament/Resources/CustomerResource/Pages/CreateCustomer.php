<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use Filament\Actions;
use App\Models\Customer;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CustomerResource;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function handleRecordCreation(array $data): Customer
    {
        $data['email_verified_at'] = now();
        $data['remember_token'] = Str::random(60);

        return Customer::create($data);
    }

    //redirect to index after create
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
