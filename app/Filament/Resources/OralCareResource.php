<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OralCareResource\Pages;
use App\Models\OralCare;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OralCareResource extends Resource
{
    protected static ?string $model = OralCare::class;

    protected static ?string $navigationIcon = 'healthicons-o-dental-hygiene';

    protected static ?string $activeNavigationIcon = 'healthicons-f-dental-hygiene';

    protected static ?string $label = 'Oral care';

    protected static ?int $navigationSort = 97;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->default(now(app(GeneralSettings::class)->timezone))
                    ->label('Date')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->numeric()
                    ->default(null),
                Forms\Components\Toggle::make('brushed'),
                Forms\Components\Toggle::make('flossed'),
                Forms\Components\Toggle::make('fluoride_taken'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable()
                    ->default('—'),
                Tables\Columns\IconColumn::make('brushed')
                    ->boolean(),
                Tables\Columns\IconColumn::make('flossed')
                    ->boolean(),
                Tables\Columns\IconColumn::make('fluoride_taken')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListOralCares::route('/'),
            'create' => Pages\CreateOralCare::route('/create'),
            'edit' => Pages\EditOralCare::route('/{record}/edit'),
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
