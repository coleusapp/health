<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutResource\Pages;
use App\Models\Workout;
use App\Settings\GeneralSettings;
use App\Settings\NavigationSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
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
                    ->default(null)
                    ->postfix(app(GeneralSettings::class)->weight_unit),
                Forms\Components\TextInput::make('distance')
                    ->numeric()
                    ->default(null)
                    ->postfix(app(GeneralSettings::class)->distance_unit),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->default(null)
                    ->postfix('minute'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('exercise.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sets')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reps')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('distance')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('duration')
                    ->default('—'),
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
                    ->orderQueryUsing(fn (Builder $query, string $direction) => $query->orderBy('created_at', 'desc'))
                    ->collapsible(),
            ])
            ->groupingDirectionSettingHidden()
            ->defaultGroup('date')
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('exercise')
                    ->relationship('exercise', 'name')
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
