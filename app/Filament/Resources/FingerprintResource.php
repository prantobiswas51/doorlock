<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Company;
use App\Models\Doorlock;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Fingerprint;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FingerprintResource\Pages;
use App\Filament\Resources\FingerprintResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class FingerprintResource extends Resource
{
    protected static ?string $model = Fingerprint::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fingerprint_id'),
                TextInput::make('fingerprint_data'),
                Select::make('doorlock_id')
                    ->label('Doorlock')
                    ->options(
                        Doorlock::pluck('identification_id', 'id')->toArray()
                    )->searchable()->required(),
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
                TextColumn::make('fingerprint_id'),
                TextColumn::make('fingerprint_data'),
                TextColumn::make('doorlock.identification_id'),
                TextColumn::make('company.name'),
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
            'index' => Pages\ListFingerprints::route('/'),
            'create' => Pages\CreateFingerprint::route('/create'),
            'edit' => Pages\EditFingerprint::route('/{record}/edit'),
        ];
    }
}
