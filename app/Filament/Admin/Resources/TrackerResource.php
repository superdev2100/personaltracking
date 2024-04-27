<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Tracker;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Admin\Resources\TrackerResource\Pages;

class TrackerResource extends Resource
{
    protected static ?string $model = Tracker::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'My Tracking';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')->nullable()->label('Category')
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->relationship('category', 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                    ]),
                Forms\Components\Select::make('sub_category_id')->nullable()
                    ->native(false)
                    ->searchable()
                    ->required()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                    ])
                    ->label('Sub category')->relationship('subCategory', 'name'),
                Forms\Components\Select::make('main_category_id')->nullable()
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Main category')->relationship('mainCategory', 'name'),
                Forms\Components\TextInput::make('amount')->numeric()
                    ->required()
                    ->label('Amount'),
                Forms\Components\TextInput::make('notes')->label('Notes'),
                Forms\Components\DatePicker::make('tracking_date')->label('Tracking Date')
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('created_by')->nullable()
                    ->native(false)
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Created by')->relationship('createdBy', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mainCategory.name')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->searchable(),
                Tables\Columns\TextColumn::make('subCategory.name')->searchable(),
                Tables\Columns\TextColumn::make('tracking_date')
                ->date(),
                // Tables\Columns\TextColumn::make('amount')->searchable(),
                Tables\Columns\TextColumn::make('notes')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()
                ->date(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Total cost')
                    ->money('INR')
                    ->searchable()
                    ->sortable()
                    ->numeric(decimalPlaces: 0)
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('INR')
                    ]),

            ])
            ->groups([
                Group::make('tracking_date')
                    ->orderQueryUsing(fn(Builder $query, string $direction) => $query->orderBy('tracking_date', $direction))
                    ->collapsible(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),
                SelectFilter::make('subCategory')
                    ->relationship('subCategory', 'name')
                    ->searchable()
                    ->multiple()
                    ->preload(),
                Filter::make('tracking_date')
                    ->form([
                        DatePicker::make('tracking_from')
                            ->native(false),
                        DatePicker::make('tracking_until')
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['tracking_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tracking_date', '>=', $date),
                            )
                            ->when(
                                $data['tracking_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tracking_date', '<=', $date),
                            );
                    })
            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrackers::route('/'),
            'create' => Pages\CreateTracker::route('/create'),
            'edit' => Pages\EditTracker::route('/{record}/edit'),
        ];
    }
}
