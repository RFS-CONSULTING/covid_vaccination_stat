<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ville;
use Filament\Resources\Form;
use App\Models\LimitProvince;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\VilleResource\Pages;
use App\Filament\Resources\VilleResource\Pages\EditVille;
use App\Filament\Resources\VilleResource\Pages\ListVilles;
use App\Filament\Resources\VilleResource\RelationManagers;
use App\Filament\Resources\VilleResource\Pages\CreateVille;

class VilleResource extends Resource
{
    protected static ?string $model = Ville::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Données villes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nom'),
                Select::make('provinces_ogc_fid')
                    ->label('provinces_ogc_fid')
                    ->options(LimitProvince::all()->pluck('nom', 'ogc_fid'))
                    ->searchable(),
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
            'index' => Pages\ListVilles::route('/'),
            'create' => Pages\CreateVille::route('/create'),
            'edit' => Pages\EditVille::route('/{record}/edit'),
        ];
    }
}
