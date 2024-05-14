<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\returnSelf;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

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
            ->badge(User::query()->where("created_at",">=",now()->subMonth())->count())
            ->badgeColor(function(){
                $value = User::query()->where("created_at",">=",now()->subMonth())->count();
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
            ->badge(User::query()->where("created_at",">=",now()->subWeek())->count())
            ->badgeColor(function(){
                $value = User::query()->where("created_at",">=",now()->subWeek())->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "Admins" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("type","Admin"))
            ->badge(User::query()->where("type","Admin")->count())
            ->badgeColor(function(){
                $value = User::query()->where("type","Admin")->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),

            "Individuals" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("type","Individual"))
            ->badge(User::query()->where("type","Individual")->count())
            ->badgeColor(function(){
                $value = User::query()->where("type","Individual")->count();
                if ($value  > 5) {
                    return "info";
                }elseif ($value  < 5 && $value > 0) {
                    return "warning";
                }else{
                    return "danger";
                }
            }),
        
            "Business" => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where("type","Business"))
            ->badge(User::query()->where("type","Business")->count())
            ->badgeColor(function(){
                $value = User::query()->where("type","Business")->count() ;
                if ($value > 5) {
                    return "info";
                }elseif ($value < 5 && $value > 0) {
                    return "warning";
                }
                else{
                    return "danger";
                }
            }),
        ];
    }
}
