<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeightResource\Pages;
use App\Models\Weight;
use App\Settings\GeneralSettings;
use App\Settings\NavigationSettings;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeightResource extends Resource
{
    protected static ?string $model = Weight::class;

    protected static ?string $navigationIcon = 'healthicons-o-weight';

    protected static ?string $activeNavigationIcon = 'healthicons-f-weight';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Time')
                    ->sortable()
                    ->dateTime('h:i A', app(GeneralSettings::class)->timezone),
            ])
            ->defaultGroup(
                Group::make('date')->date()
                    ->collapsible()
                    ->orderQueryUsing(fn(Builder $query, string $direction = 'asc') => $query->orderBy('date', 'desc'))
            )
            ->groupingDirectionSettingHidden()
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('date_after')->native(false),
                        DatePicker::make('date_before')->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_after'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['date_before'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema(self::schema());
    }

    public static function schema(): array
    {
        return [
            Forms\Components\TextInput::make('weight')
                ->required()
                ->numeric()
                ->autofocus(),
            Forms\Components\DateTimePicker::make('date')
                ->default(now())
                ->required()
                ->native(false),
        ];
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
            'index' => Pages\ListWeights::route('/'),
            'create' => Pages\CreateWeight::route('/create'),
            'edit' => Pages\EditWeight::route('/{record}/edit'),
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
        return app(NavigationSettings::class)->weight;
    }
}
