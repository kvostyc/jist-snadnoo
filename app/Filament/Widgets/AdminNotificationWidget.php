<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AdminNotificationWidget extends Widget
{
    protected static string $view = 'filament.widgets.admin-notification-widget';

    protected static ?int $sort = 0;

    protected string|int|array $columnSpan = 'full';
}
