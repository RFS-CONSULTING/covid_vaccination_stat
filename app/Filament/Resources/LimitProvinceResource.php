<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\LimitProvince;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\LimitProvinceResource\Pages;
use App\Filament\Resources\LimitProvinceResource\RelationManagers;

class LimitProvinceResource extends Resource
{
    protected static ?string $model = LimitProvince::class;

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
                TextInput::make('pers_cib_v'),
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
            'index' => Pages\ListLimitProvinces::route('/'),
            'create' => Pages\CreateLimitProvince::route('/create'),
            'edit' => Pages\EditLimitProvince::route('/{record}/edit'),
        ];
    }
}
