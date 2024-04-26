<?php

namespace App\Filament\Admin\Resources\SubCategoryResource\Pages;

use App\Filament\Admin\Resources\SubCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubCategory extends CreateRecord
{
    protected static string $resource = SubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
