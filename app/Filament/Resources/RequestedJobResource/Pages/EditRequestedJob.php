<?php

namespace App\Filament\Resources\RequestedJobResource\Pages;

use App\Filament\Resources\RequestedJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRequestedJob extends EditRecord
{
    protected static string $resource = RequestedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
