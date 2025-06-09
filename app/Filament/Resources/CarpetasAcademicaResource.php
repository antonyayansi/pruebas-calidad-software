<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarpetasAcademicaResource\Pages;
use App\Filament\Resources\CarpetasAcademicaResource\RelationManagers;
use App\Models\CarpetasAcademica;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarpetasAcademicaResource extends Resource
{
    protected static ?string $model = CarpetasAcademica::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('resultados')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),
                Forms\Components\Select::make('cursos_id')
                    ->relationship('curso', 'nombre')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('resultados')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('curso.nombre')
                    ->label('Curso')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListCarpetasAcademicas::route('/'),
            'create' => Pages\CreateCarpetasAcademica::route('/create'),
            'edit' => Pages\EditCarpetasAcademica::route('/{record}/edit'),
        ];
    }
}
