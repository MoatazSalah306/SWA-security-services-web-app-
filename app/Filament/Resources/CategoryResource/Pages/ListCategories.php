<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array
    {
        return [
            "All" => Tab::make(),
            "This Month" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("created_at",">=",now()->subMonth()))
            ->badge(Category::query()->where("created_at",">=",now()->subMonth())->count())
            ->badgeColor(function(){
                $value = Category::query()->where("created_at",">=",now()->subMonth())->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "This Week" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("created_at",">=",now()->subWeek()))
            ->badge(Category::query()->where("created_at",">=",now()->subWeek())->count())
            ->badgeColor(function(){
                $value = Category::query()->where("created_at",">=",now()->subWeek())->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            })
        ];
    }
}
