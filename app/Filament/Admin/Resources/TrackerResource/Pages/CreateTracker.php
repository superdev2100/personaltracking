<?php

namespace App\Filament\Admin\Resources\TrackerResource\Pages;

use App\Filament\Admin\Resources\TrackerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTracker extends CreateRecord
{
    protected static string $resource = TrackerResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
