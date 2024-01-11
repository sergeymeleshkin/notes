<?php

declare(strict_types=1);

namespace App\Routing\Concerns;

use App\Routing\Contracts\RouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;
use RuntimeException;

trait MapRouteRegistrars
{
    protected function mapRoutes(Registrar $router, array $routes): void
    {
        foreach ($routes as $route){
            if (! is_subclass_of($route, RouteRegistrar::class))
            {
                throw new RuntimeException(sprintf(
                    'Cannot map routes \'%s\'',
                    $route
                ));
            }
            (new $route)->map($router);
        }
    }
}
