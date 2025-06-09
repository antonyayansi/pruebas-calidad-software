<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AccesosDirectos extends Widget
{
    protected static string $view = 'filament.widgets.accesos-directos';
    protected static ?int $sort = -1; // Para que se muestre al inicio

    protected static bool $isLazy = false; // Para que cargue de inmediato
}
