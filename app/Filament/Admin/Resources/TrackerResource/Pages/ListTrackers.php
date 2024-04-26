<?php

namespace App\Filament\Admin\Resources\TrackerResource\Pages;

use App\Filament\Admin\Resources\TrackerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrackers extends ListRecords
{
    protected static string $resource = TrackerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
