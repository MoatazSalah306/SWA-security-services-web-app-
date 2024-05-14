<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

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
            ->badge(Order::query()->where("created_at",">=",now()->subMonth())->count())
            ->badgeColor(function(){
                $value = Order::query()->where("created_at",">=",now()->subMonth())->count();
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
            ->badge(Order::query()->where("created_at",">=",now()->subWeek())->count())
            ->badgeColor(function(){
                $value = Order::query()->where("created_at",">=",now()->subWeek())->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),


            "Pending" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("status","Pending"))
            ->badge(Order::query()->where("status","Pending")->count())
            ->badgeColor(function(){
                $value = Order::query()->where("status","Pending")->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "Done" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("status","Done"))
            ->badge(Order::query()->where("status","Done")->count())
            ->badgeColor(function(){
                $value = Order::query()->where("status","Done")->count();
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
