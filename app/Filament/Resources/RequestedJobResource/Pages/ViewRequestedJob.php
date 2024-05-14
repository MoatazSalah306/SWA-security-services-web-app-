<?php

namespace App\Filament\Resources\RequestedJobResource\Pages;

use App\Filament\Resources\RequestedJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRequestedJob extends ViewRecord
{
    protected static string $resource = RequestedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
