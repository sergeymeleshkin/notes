<?php

declare(strict_types=1);

namespace App\Routing\Routes\Api;

use App\Http\Controllers\Api\GroupUsersController;
use App\Routing\Contracts\RouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;

class AuthGroupsRoute implements RouteRegistrar
{
    public function map(Registrar $router): void
    {
        $router->group([
            'name' => 'groups.',
            'prefix' => 'groups'
        ], function () use ($router){
            $router->resource('users', GroupUsersController::class)->withTrashed();
        });
    }
}
