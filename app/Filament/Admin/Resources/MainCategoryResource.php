<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MainCategoryResource\Pages;
use App\Models\MainCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MainCategoryResource extends Resource
{
    protected static ?string $model = MainCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\DeleteBulkAction::make(),
            // ])
            ;
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMainCategories::route('/'),
            'create' => Pages\CreateMainCategory::route('/create'),
            'edit' => Pages\EditMainCategory::route('/{record}/edit'),
        ];
    }
}
