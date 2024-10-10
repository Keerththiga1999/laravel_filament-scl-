<?php

namespace App\Filament\Resources\GradeResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SubjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'subjects';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('subject_order')
                    ->required()
                    ->numeric(),
                    ColorPicker::make('color')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('subject_name')
            ->columns([
                Tables\Columns\TextColumn::make('subject_name')->label('Subject Name'),
                Tables\Columns\TextColumn::make('subject_order')->label('Subject Order'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
