<?php

namespace App\Filament\Admin\Resources\MainCategoryResource\Pages;

use App\Filament\Admin\Resources\MainCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainCategories extends ListRecords
{
    protected static string $resource = MainCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
