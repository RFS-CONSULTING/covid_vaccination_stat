<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\SitesVaccination;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\SitesVaccinationResource\Pages;
use App\Filament\Resources\SitesVaccinationResource\RelationManagers;
use App\Filament\Resources\SitesVaccinationResource\Pages\EditSitesVaccination;
use App\Filament\Resources\SitesVaccinationResource\Pages\ListSitesVaccinations;
use App\Filament\Resources\SitesVaccinationResource\Pages\CreateSitesVaccination;
use App\Models\LimitProvince;

class SitesVaccinationResource extends Resource
{
    protected static ?string $model = SitesVaccination::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nom'),
                TextInput::make('adresse'),
                TextInput::make('horaire'),
                Select::make('provinces_ogc_fid')
                    ->label('provinces_ogc_fid')
                    ->options(LimitProvince::all()->pluck('nom', 'ogc_fid'))
                    ->searchable(),
                TextInput::make('contact'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('provinces_ogc_fid'),
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
            'index' => Pages\ListSitesVaccinations::route('/'),
            'create' => Pages\CreateSitesVaccination::route('/create'),
            'edit' => Pages\EditSitesVaccination::route('/{record}/edit'),
        ];
    }
}
