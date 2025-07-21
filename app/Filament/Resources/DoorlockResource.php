<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Company;
use App\Models\Doorlock;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DoorlockResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DoorlockResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class DoorlockResource extends Resource
{
    protected static ?string $model = Doorlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('identification_id')->unique()->required(),
                Select::make('company_id')
                    ->label('Company')
                    ->options(
                        Company::pluck('name', 'id')->toArray()
                    )->searchable()->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('identification_id'),
                TextColumn::make('company_id'),
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
            'index' => Pages\ListDoorlocks::route('/'),
            'create' => Pages\CreateDoorlock::route('/create'),
            'edit' => Pages\EditDoorlock::route('/{record}/edit'),
        ];
    }
}
