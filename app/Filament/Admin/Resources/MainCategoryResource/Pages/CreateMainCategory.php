<?php

namespace App\Filament\Admin\Resources\MainCategoryResource\Pages;

use App\Filament\Admin\Resources\MainCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMainCategory extends CreateRecord
{
    protected static string $resource = MainCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
