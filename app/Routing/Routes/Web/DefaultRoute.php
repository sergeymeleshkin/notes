<?php

declare(strict_types=1);

namespace App\Routing\Routes\Web;

use App\Routing\Contracts\RouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;

class DefaultRoute implements RouteRegistrar
{
    public function map(Registrar $router): void
    {
        $router->view('/', 'app');
    }
}
