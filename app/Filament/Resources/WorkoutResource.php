<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutResource\Pages;
use App\Models\Exercise;
use App\Models\Workout;
use App\Services\ExercisePostfixService;
use App\Services\TinyCacheService;
use App\Settings\GeneralSettings;
use App\Settings\NavigationSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkoutResource extends Resource
{
    protected static ?string $model = Workout::class;

    protected static ?string $label = 'Workouts';

    protected static ?string $navigationGroup = 'Workouts';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->default(now(app(GeneralSettings::class)->timezone)->toDateString())
                    ->label('Date')
                    ->native(false)
                    ->required(),
                Repeater::make('exerciseWorkouts')
                    ->relationship()
                    ->label('Exercises')
                    ->cloneable()
                    ->deletable()
                    ->reorderable()
                    ->reorderableWithButtons()
                    ->schema([
                        Forms\Components\Select::make('exercise_id')
                            ->relationship('exercise', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->createOptionForm(ExerciseResource::schema())
                            ->live(onBlur: true, debounce: 500),
                        Forms\Components\TextInput::make('reps')
                            ->numeric()
                            ->default(null)
                            ->visible(fn (Get $get): bool => $get('exercise_id') && TinyCacheService::getOrPut('exercise-'.$get('exercise_id'), fn () => Exercise::find($get('exercise_id')))?->has_rep),
                        Forms\Components\TextInput::make('weight')
                            ->numeric()
                            ->default(null)
                            ->postfix(fn (Get $get) => ExercisePostfixService::postfix($get('exercise_id'))['weight_unit'])
                            ->visible(fn (Get $get): bool => $get('exercise_id') && TinyCacheService::getOrPut('exercise-'.$get('exercise_id'), fn () => Exercise::find($get('exercise_id')))?->has_weight),
                        Forms\Components\TextInput::make('distance')
                            ->numeric()
                            ->default(null)
                            ->postfix(fn (Get $get) => ExercisePostfixService::postfix($get('exercise_id'))['distance_unit'])
                            ->visible(fn (Get $get): bool => $get('exercise_id') && TinyCacheService::getOrPut('exercise-'.$get('exercise_id'), fn () => Exercise::find($get('exercise_id')))?->has_distance),
                        Forms\Components\TextInput::make('duration')
                            ->numeric()
                            ->default(null)
                            ->postfix(fn (Get $get) => ExercisePostfixService::postfix($get('exercise_id'))['duration_unit'])
                            ->visible(fn (Get $get): bool => $get('exercise_id') && TinyCacheService::getOrPut('exercise-'.$get('exercise_id'), fn () => Exercise::find($get('exercise_id')))?->has_duration),
                        Forms\Components\TextInput::make('calorie')
                            ->numeric()
                            ->default(null)
                            ->visible(fn (Get $get): bool => $get('exercise_id') && TinyCacheService::getOrPut('exercise-'.$get('exercise_id'), fn () => Exercise::find($get('exercise_id')))?->has_calorie),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('exerciseWorkouts')->view('tables.columns.exercise-list'),
                Tables\Columns\TextColumn::make('exercise_workouts_sum_calorie')
                    ->label('Calories')
                    ->sum('exerciseWorkouts', 'calorie'),
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
                    ->orderQueryUsing(fn (Builder $query, string $direction) => $query->orderBy('created_at', 'desc'))
                    ->collapsible(),
            ])
            ->groupingDirectionSettingHidden()
            ->defaultGroup('date')
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function (Builder $query) {
                $query->with('exerciseWorkouts', 'exerciseWorkouts.exercise'); // ?
            })
            // ->filters([
            //     SelectFilter::make('exercise')
            //         ->relationship('exercise', 'name')
            //         ->searchable()
            //         ->preload(),
            //     Tables\Filters\TrashedFilter::make(),
            // ], layout: Tables\Enums\FiltersLayout::AboveContent)
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

    public static function shouldRegisterNavigation(): bool
    {
        return app(NavigationSettings::class)->workout;
    }
}
