<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorarioResource\Pages;
use App\Filament\Resources\HorarioResource\RelationManagers;
use App\Models\Horario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HorarioResource extends Resource
{
    protected static ?string $model = Horario::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('fecha_inicio')
                    ->minDate(now())
                    ->required(),
                Forms\Components\DateTimePicker::make('fecha_fin')
                    ->minDate(now())
                    ->required(),
                Forms\Components\Select::make('aulas_id')
                    ->relationship('aula', 'codigo')
                    ->required(),
                Forms\Components\Select::make('cursos_id')
                    ->relationship('curso', 'nombre')
                    ->required(),
                Forms\Components\Select::make('docentes_id')
                    ->relationship('docente', 'nombres')
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),
                Forms\Components\Select::make('tipo')
                    ->options([
                        'teoria' => 'Teoría',
                        'practica' => 'Práctica',
                    ])
                    ->default('teoria')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('aula.codigo')
                    ->label('Aula')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('curso.nombre')
                    ->label('Curso')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('docente.nombres')
                    ->label('Docente')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo')
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
            'index' => Pages\ListHorarios::route('/'),
            'create' => Pages\CreateHorario::route('/create'),
            'edit' => Pages\EditHorario::route('/{record}/edit'),
        ];
    }
}
