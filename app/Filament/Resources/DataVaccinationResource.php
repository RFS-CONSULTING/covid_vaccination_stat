<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\DataVaccination;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\DataVaccinationResource\Pages;
use App\Filament\Resources\DataVaccinationResource\RelationManagers;
use App\Filament\Resources\DataVaccinationResource\Pages\EditDataVaccination;
use App\Filament\Resources\DataVaccinationResource\Pages\ListDataVaccinations;
use App\Filament\Resources\DataVaccinationResource\Pages\CreateDataVaccination;

class DataVaccinationResource extends Resource
{
    protected static ?string $model = DataVaccination::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nom'),
                TextInput::make('chef_lieu'),
                TextInput::make('pop_total'),
                TextInput::make('pers_vacci'),
                TextInput::make('nbre_sites'),
                TextInput::make('nbre_jours'),
                TextInput::make('pop_adulte'),
                TextInput::make('pers_cib_v'),
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
            'index' => Pages\ListDataVaccinations::route('/'),
            'create' => Pages\CreateDataVaccination::route('/create'),
            'edit' => Pages\EditDataVaccination::route('/{record}/edit'),
        ];
    }
}
