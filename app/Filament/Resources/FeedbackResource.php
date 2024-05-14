<?php

namespace App\Filament\Resources;

use Filament\Infolists\Components\Section;
use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;
    protected static ?string $navigationLabel = 'Users FeedBack';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

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
            Forms\Components\Section::make("Feedback details")
            ->schema([
                Forms\Components\Select::make('user_id')
                ->relationship(name:'user',titleAttribute:'name')
                ->searchable()
                ->preload()
                ->native(false)
                ->required(),
                Forms\Components\Textarea::make("body")
                ->required()
                
            ])
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('body')
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
            Section::make("Feedback info.")
            ->schema([
                TextEntry::make("user.name")->label("User name")->color("primary"),
                TextEntry::make("body")->color("primary"),
                TextEntry::make("created_at")->color("primary"),
            ])->columns(3)

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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            // 'view' => Pages\ViewFeedback::route('/{record}'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
