<?php

namespace App\Filament\Resources\RequestedJobResource\Pages;

use App\Filament\Resources\RequestedJobResource;
use App\Models\RequestedJob;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListRequestedJobs extends ListRecords
{
    protected static string $resource = RequestedJobResource::class;

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
            ->badge(RequestedJob::query()->where("created_at",">=",now()->subMonth())->count())
            ->badgeColor(function(){
                $value = RequestedJob::query()->where("created_at",">=",now()->subMonth())->count();
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
            ->badge(RequestedJob::query()->where("created_at",">=",now()->subWeek())->count())
            ->badgeColor(function(){
                $value = RequestedJob::query()->where("created_at",">=",now()->subWeek())->count();
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
            ->badge(RequestedJob::query()->where("status","Pending")->count())
            ->badgeColor(function(){
                $value = RequestedJob::query()->where("status","Pending")->count();
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
            ->badge(RequestedJob::query()->where("status","Done")->count())
            ->badgeColor(function(){
                $value = RequestedJob::query()->where("status","Done")->count();
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
