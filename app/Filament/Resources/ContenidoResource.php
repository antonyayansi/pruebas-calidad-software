<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContenidoResource\Pages;
use App\Filament\Resources\ContenidoResource\RelationManagers;
use App\Models\Contenido;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContenidoResource extends Resource
{
    protected static ?string $model = Contenido::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->required()
                    ->maxLength(1000),
                Forms\Components\FileUpload::make('archivo')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->maxSize(10240), // 10 MB
                Forms\Components\Select::make('estado')
                    ->options([
                        'activo' => 'Activo',
                        'inactivo' => 'Inactivo',
                    ])
                    ->default('activo')
                    ->required(),
                Forms\Components\Select::make('carpeta_academicas_id')
                    ->relationship('carpetaAcademica', 'nombre')
                    ->required(),
                Forms\Components\Select::make('users_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('archivo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('carpetaAcademica.nombre')
                    ->label('Carpeta Académica')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Usuario')
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
            'index' => Pages\ListContenidos::route('/'),
            'create' => Pages\CreateContenido::route('/create'),
            'edit' => Pages\EditContenido::route('/{record}/edit'),
        ];
    }
}
