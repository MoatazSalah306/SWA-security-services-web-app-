<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestedJobResource\Pages;
use App\Filament\Resources\RequestedJobResource\RelationManagers;
use App\Models\RequestedJob;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestedJobResource extends Resource
{
    protected static ?string $model = RequestedJob::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Requests';
    protected static ?string $navigationLabel = 'Requested Jobs';
    protected static ?string $navigationGroup = 'System Management';

    public static function getNavigationBadge():?string 
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null 
    {
        $value = static::getModel()::count();
                if ($value  >= 5) {
                    return "info";
                }elseif ($value <> 0) {
                    return "warning";
                }else{
                    return "danger";
                }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("Request details")
                ->description("More info about the requested job.")
                ->schema([
                    Forms\Components\Select::make('user_id')
                    ->relationship(name:'user',titleAttribute:'name')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->required(),

                    Forms\Components\Select::make('service_id')
                    ->relationship(name:'service',titleAttribute:'title')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->required(),

                    Forms\Components\Select::make('status')
                    ->options([
                        "Pending"=>"Pending",
                        "Done"=>"Done",
                    ])
                    ->native(false)
                    ->required(),

                    Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                  
                    
                ])->columns(2)
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Done' => 'success',
                        default => 'secondary', // Default color for unexpected values
                    })
                    ->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist):Infolist
    {
        return $infolist
        ->schema([
            Section::make("Request info.")
            ->schema([
                TextEntry::make("user.name")->label("User name")->color("primary"),
                TextEntry::make("description")->color("primary"),
                TextEntry::make("status")->color("primary"),
                TextEntry::make("created_at")->color("primary")
            ])->columns(2)

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
            'index' => Pages\ListRequestedJobs::route('/'),
            'create' => Pages\CreateRequestedJob::route('/create'),
            // 'view' => Pages\ViewRequestedJob::route('/{record}'),
            'edit' => Pages\EditRequestedJob::route('/{record}/edit'),
        ];
    }
}
