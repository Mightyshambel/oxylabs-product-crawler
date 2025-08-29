<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\View\View;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected function getFooterWidgets(): array
    {
        return [];
    }

    public function getFooter(): ?View
    {
        return view('filament.footer');
    }
}
