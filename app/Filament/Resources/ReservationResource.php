<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Models\Reservation\Reservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = 'Restaurant';

    protected static ?string $label = "Rezerváciu";

    protected static ?string $pluralModelLabel = "Rezervácie";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(5)->schema([
                    Section::make('General')->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label(__('reservation.name'))
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('table_id')
                            ->relationship('table', 'name', function ($query, $get) {
                                $guestCount = $get('guest_count');
                                if ($guestCount) {
                                    return $query->where('available_for_guest_count', '>=', $guestCount);
                                }
                                return $query;
                            })
                            ->label(__('reservation.table'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->reactive(),

                        DatePicker::make('date')
                            ->label(__('reservation.date'))
                            ->required()
                            ->displayFormat('d.m.Y')
                            ->native(),

                        TimePicker::make('time')
                            ->label(__('reservation.time'))
                            ->required()
                            ->format('H:i')
                            ->displayFormat('H:i'),

                        TextInput::make('guest_count')
                            ->label(__('reservation.guests'))
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(8)
                            ->reactive()
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state > 8) {
                                    $set('guest_count', 8);
                                }
                                if ($state < 1) {
                                    $set('guest_count', 1);
                                }
                            }),

                        Select::make('reservation_status_id')
                            ->relationship('reservation_status', 'name')
                            ->label(__('reservation.status'))
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])->columnSpan(3),
                    Section::make('Audit')->schema([
                        DateTimePicker::make('updated_at')->readonly(),
                        DateTimePicker::make('created_at')->readonly(),
                    ])->columnSpan(2)->hiddenOn('create'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("user.name")
                    ->label(__('reservation.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("table.name")
                    ->label(__('reservation.table'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make("date")
                    ->label(__('reservation.date'))
                    ->date("d.m.Y")
                    ->sortable()
                    ->searchable(),
                TextColumn::make("time")
                    ->label(__('reservation.time'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make("guest_count")
                    ->label(__('reservation.guests'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make("reservation_status.name")
                    ->label(__('reservation.status'))
                    ->badge()
                    ->color(function ($record) {
                        return $record->reservation_status?->color_hex ?? 'gray';
                    })
                    ->formatStateUsing(function ($record) {
                        return $record->reservation_status?->name ?? '-';
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
