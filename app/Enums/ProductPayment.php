<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProductPayment: string implements HasLabel, HasColor, HasIcon
{
    case TERTUNDA = 'Tertunda';
    case MENUNGGU_KONFIRMASI = 'Menunggu Konfirmasi';
    case SUKSES = 'Sukses';
    case GAGAL = 'Gagal';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::TERTUNDA => 'Tertunda',
            self::MENUNGGU_KONFIRMASI => 'Menunggu Konfirmasi',
            self::SUKSES => 'Sukses',
            self::GAGAL => 'Gagal',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::TERTUNDA => 'bg-yellow-300 text-black',
            self::MENUNGGU_KONFIRMASI => 'bg-blue-500 text-white',
            self::SUKSES => 'bg-green-500 text-white',
            self::GAGAL => 'bg-red-500 text-white',
        };
    }


    public function getIcon(): ?string
    {
        return match ($this) {
            self::TERTUNDA => 'heroicon-o-stop',
            self::MENUNGGU_KONFIRMASI => 'heroicon-m-arrow-path-rounded-square',
            self::SUKSES => 'heroicon-c-check',
            self::GAGAL => 'heroicon-o-exclamation-triangle',
        };
    }
}
