<?php

namespace App\Filament\Resources;

use App\Enums\DistanceEnum;
use App\Enums\DurationEnum;
use App\Enums\WeightEnum;
use App\Filament\Resources\ExerciseResource\Pages;
use App\Models\Exercise;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExerciseResource extends Resource
{
    protected static ?string $model = Exercise::class;

    protected static ?string $navigationGroup = 'Workouts';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema(self::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('exerciseMuscleGroups.muscleGroup.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('categoryExercises.category.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('has_rep')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_weight')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_distance')
                    ->boolean()
                    ->label('Has Repetition'),
                Tables\Columns\IconColumn::make('has_duration')
                    ->boolean()
                    ->label('Has Repetition'),
                Tables\Columns\IconColumn::make('has_calorie')
                    ->boolean()
                    ->label('Has Repetition'),
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
            ->filters([
                SelectFilter::make('muscle_group_id')
                    ->relationship('exerciseMuscleGroups.muscleGroup', 'name')
                    ->label('Muscle group')
                    ->searchable()
                    ->preload(),
                Tables\Filters\TrashedFilter::make(),
            ], layout: Tables\Enums\FiltersLayout::AboveContent)
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
            'index' => Pages\ListExercises::route('/'),
            'create' => Pages\CreateExercise::route('/create'),
            'edit' => Pages\EditExercise::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function schema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\RichEditor::make('description')
                ->columnSpanFull(),
            Forms\Components\Section::make('Type of exercise')
                ->description('These attributes will be displayed when creating a new exercise of this type')
                ->schema([
                    Forms\Components\Toggle::make('has_rep')->default(false),
                    Forms\Components\Toggle::make('has_weight')
                        ->default(false)
                        ->live(),
                    Select::make('weight_unit')
                        ->label('Weight unit')
                        ->options(WeightEnum::class)
                        ->native(false)
                        ->preload()
                        ->default(app(GeneralSettings::class)->weight_unit)
                        ->visible(fn (Get $get): bool => $get('has_weight')),
                    Forms\Components\Toggle::make('has_distance')
                        ->default(false)
                        ->live(),
                    Select::make('distance_unit')
                        ->label('Distance unit')
                        ->options(DistanceEnum::class)
                        ->native(false)
                        ->preload()
                        ->default(app(GeneralSettings::class)->distance_unit)
                        ->visible(fn (Get $get): bool => $get('has_distance')),
                    Forms\Components\Toggle::make('has_duration')
                        ->default(false)
                        ->live(),
                    Select::make('duration_unit')
                        ->label('Duration unit')
                        ->options(DurationEnum::class)
                        ->native(false)
                        ->preload()
                        ->default(app(GeneralSettings::class)->duration_unit)
                        ->visible(fn (Get $get): bool => $get('has_duration')),
                    Forms\Components\Toggle::make('has_calorie')
                        ->default(false),
                ])
            ->columnSpan(1),
            Forms\Components\Section::make('Meta Information')
                ->description('Meta information about the exercise')
                ->schema([
                    Repeater::make('categoryExercises')
                        ->relationship()
                        ->label('Category')
                        ->reorderable()
                        ->reorderableWithButtons()
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->createOptionForm(CategoryResource::schema())
                                ->preload()
                                ->searchable()
                                ->required(),
                        ]),
                    Repeater::make('exerciseMuscleGroups')
                        ->relationship()
                        ->label('Muscle Groups')
                        ->reorderable()
                        ->reorderableWithButtons()
                        ->schema([
                            Forms\Components\Select::make('muscle_group_id')
                                ->relationship('muscleGroup', 'name')
                                ->createOptionForm(MuscleGroupResource::schema())
                                ->preload()
                                ->searchable()
                                ->required(),
                        ])
                ])
                ->columnSpan(1),
        ];
    }
}
