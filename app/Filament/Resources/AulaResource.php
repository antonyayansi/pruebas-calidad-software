<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AulaResource\Pages;
use App\Filament\Resources\AulaResource\RelationManagers;
use App\Models\Aula;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AulaResource extends Resource
{
    protected static ?string $model = Aula::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipo')
                    ->required()
                    ->options([
                        'teoria' => 'Teoría',
                        'laboratorio' => 'Laboratorio',
                        'mixto' => 'Mixto',
                    ]),
                Forms\Components\TextInput::make('aforo')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('estado')
                    ->options([
                        'Disponible' => 'Disponible',
                        'Ocupada' => 'Ocupada',
                        'Mantenimiento' => 'Mantenimiento',
                    ])
                    ->default('Disponible')
                    ->required(),
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo'),
                Tables\Columns\TextColumn::make('tipo'),
                Tables\Columns\TextColumn::make('aforo'),
                Tables\Columns\TextColumn::make('estado'),
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
            'index' => Pages\ListAulas::route('/'),
            'create' => Pages\CreateAula::route('/create'),
            'edit' => Pages\EditAula::route('/{record}/edit'),
        ];
    }
}
