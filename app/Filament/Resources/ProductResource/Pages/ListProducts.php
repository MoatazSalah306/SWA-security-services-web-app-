<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

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
            "Less Than 200" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("price","<",200))
            ->badge(Product::query()->where("price","<",200)->count())
            ->badgeColor(function(){
                $value = Product::query()->where("price","<",200)->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "Between 200 And 400" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->whereBetween('price', [200, 400]))
            ->badge(Product::query()->whereBetween('price', [200, 400])->count())
            ->badgeColor(function(){
                $value = Product::query()->whereBetween('price', [200, 400])->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "More Than 400" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("price",">",400))
            ->badge(Product::query()->where("price",">",400)->count())
            ->badgeColor(function(){
                $value = Product::query()->where("price",">",400)->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),
        ];
    }
}
