<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;


class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled(fn ($record) => $record !== null), // Kunci kalo record-nya udah ada (mode edit)

                Select::make('item_id')
                    ->relationship('item', 'name')
                    ->required()
                    ->disabled(fn ($record) => $record !== null), // Kunci pas edit

                DatePicker::make('start_date')
                    ->required()
                    ->disabled(fn ($record) => $record !== null), // Kunci pas edit

                DatePicker::make('end_date')
                    ->required()
                    ->disabled(fn ($record) => $record !== null), // Kunci pas edit

                TextInput::make('total_price')
                    ->numeric()
                    ->prefix('Rp')
                    ->required()
                    ->disabled(fn ($record) => $record !== null), // Kunci pas edit

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'done' => 'Done',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(), // Ini biarin ngga pake disabled biar bisa diubah statusnya
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Customer'),
                TextColumn::make('item.name'),
                TextColumn::make('start_date')->date(),
                TextColumn::make('end_date')->date(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'approved' => 'info',
                        'done' => 'success',
                        'cancelled' => 'danger',
                    }),
                TextColumn::make('total_price')->money('idr'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
