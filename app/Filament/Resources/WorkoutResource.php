<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutResource\Pages;
use App\Filament\Resources\WorkoutResource\RelationManagers;
use App\Models\Workout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkoutResource extends Resource
{
    protected static ?string $model = Workout::class;

    protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Gym';
    protected static ?int $navigationSort = 0;
    protected static ?string $label = 'Workouts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->default(today()->toDateString())
                    ->label('Workout Date')
                    ->required(),
                Forms\Components\Select::make('exercise_id')
                    ->relationship('exercise', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm(ExerciseResource::schema()),
                Forms\Components\TextInput::make('sets')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('reps')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('weight')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('distance')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->default(0),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sets')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reps')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('distance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('exercise.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->groups([
                Group::make('date')->date()
                    ->collapsible(),
            ])
            ->defaultGroup('date')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListWorkouts::route('/'),
            'create' => Pages\CreateWorkout::route('/create'),
            'edit' => Pages\EditWorkout::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
