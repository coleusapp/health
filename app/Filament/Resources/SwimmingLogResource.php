<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SwimmingLogResource\Pages;
use App\Models\SwimmingLog;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SwimmingLogResource extends Resource
{
    protected static ?string $model = SwimmingLog::class;

    protected static ?string $navigationIcon = 'healthicons-o-swim';

    protected static ?string $activeNavigationIcon = 'healthicons-f-swim';

    protected static ?string $label = 'Swimming';

    protected static ?int $navigationSort = 98;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->default(now(app(GeneralSettings::class)->timezone))
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
                    ->default(null),
                Forms\Components\TextInput::make('distance')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->sortable()
                    ->since(app(GeneralSettings::class)->timezone),
                Tables\Columns\TextColumn::make('swimmingType.name')
                    ->sortable(),
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
            'index' => Pages\ListSwimmingLogs::route('/'),
            'create' => Pages\CreateSwimmingLog::route('/create'),
            'edit' => Pages\EditSwimmingLog::route('/{record}/edit'),
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