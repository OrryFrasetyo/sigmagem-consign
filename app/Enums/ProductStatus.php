<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProductStatus: string implements HasLabel, HasColor
{
    case BELUM_DIPROSES = 'Belum Diproses';
    case DIKEMAS = 'Dikemas';
    case DIPROSES = 'Diproses';
    case DIKIRIM = 'Dikirim';
    case DITERIMA = 'Diterima';
    case PESANAN_SELESAI = 'Pesanan Selesai';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'Belum Diproses',
            self::DIKEMAS => 'Dikemas',
            self::DIPROSES => 'Diproses',
            self::DIKIRIM => 'Dikirim',
            self::DITERIMA => 'Diterima',
            self::PESANAN_SELESAI => 'Pesanan Selesai',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::BELUM_DIPROSES => 'gray',
            self::DIKEMAS => 'info',
            self::DIPROSES => 'warning',
            self::DIKIRIM => 'primary',
            self::DITERIMA => 'success',
            self::PESANAN_SELESAI => 'success',
        };
    }

}
