<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\LimitPays;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\LimitPaysResource\Pages;
use App\Filament\Resources\LimitPaysResource\RelationManagers;
use App\Filament\Resources\LimitPaysResource\Pages\EditLimitPays;
use App\Filament\Resources\LimitPaysResource\Pages\ListLimitPays;
use App\Filament\Resources\LimitPaysResource\Pages\CreateLimitPays;

class LimitPaysResource extends Resource
{
    protected static ?string $model = LimitPays::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nom'),
                TextInput::make('chef_lieu'),
                TextInput::make('pop_totale'),
                TextInput::make('pers_vacci'),
                TextInput::make('nbre_sites'),
                TextInput::make('nbre_jours'),
                TextInput::make('pop_adulte'),
                TextInput::make('date_debut'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('ogc_fid'),
                TextColumn::make('nom'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListLimitPays::route('/'),
            'create' => Pages\CreateLimitPays::route('/create'),
            'edit' => Pages\EditLimitPays::route('/{record}/edit'),
        ];
    }
}
