<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SwimResource\Pages;
use App\Models\Swim;
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

class SwimResource extends Resource
{
    protected static ?string $model = Swim::class;

    protected static ?string $navigationIcon = 'healthicons-o-swim';

    protected static ?string $activeNavigationIcon = 'healthicons-f-swim';

    protected static ?string $label = 'Swim';

    protected static ?int $navigationSort = 98;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->default(now())
                    ->timezone(app(GeneralSettings::class)->timezone)
                    ->label('Date')
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('swimming_type_id')
                    ->relationship('swimmingType', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm(SwimmingTypeResource::schema())
                    ->editOptionForm(SwimmingTypeResource::schema()),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->default(null)
                    ->suffix('minutes'),
                Forms\Components\TextInput::make('distance')
                    ->numeric()
                    ->default(null)
                    ->suffix('meters'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('swimmingType.name'),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('distance')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->filters([
                SelectFilter::make('Swimming Type')
                    ->multiple()
                    ->preload()
                    ->relationship('swimmingType', 'name'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->groups([
                Group::make('date')
                    ->date()
                    ->collapsible(),
            ])
            ->defaultGroup('date')
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
            'index' => Pages\ListSwims::route('/'),
            'create' => Pages\CreateSwim::route('/create'),
            'edit' => Pages\EditSwim::route('/{record}/edit'),
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
        return app(NavigationSettings::class)->swim;
    }
}
