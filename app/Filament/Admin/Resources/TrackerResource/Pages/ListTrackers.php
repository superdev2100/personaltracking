<?php

namespace App\Filament\Admin\Resources\TrackerResource\Pages;

use App\Filament\Admin\Resources\TrackerResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
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

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'Income' => Tab::make()->query(fn ($query) => $query->where('main_category_id', '1')),
            'Savings' => Tab::make()->query(fn ($query) => $query->where('main_category_id', '2')),
            'Expenses' => Tab::make()->query(fn ($query) => $query->where('main_category_id', '3')),
            'Savings Via Expenses' => Tab::make()->query(fn ($query) => $query->where('main_category_id', '4')),
        ];
    }

    public function setPage($page, $pageName = 'page'): void
    {
        parent::setPage($page, $pageName);

        $this->dispatch('scroll-to-top');
    }
}
