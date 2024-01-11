<?php

namespace App\Providers;

use App\Routing\Concerns\MapRouteRegistrars;
use App\Routing\Routes\Api\AuthGroupsRoute;
use App\Routing\Routes\Api\FormsRoute;
use App\Routing\Routes\Web\DefaultRoute;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    use MapRouteRegistrars;
    public const HOME = '/home';


    protected $routes = [
        'api' => [
            AuthGroupsRoute::class,
            FormsRoute::class
        ],
        'web' => [
            DefaultRoute::class
        ]
    ];

    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(90)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function (Registrar $router) {
            $router->group([
                'middleware' => 'api',
                'prefix' => 'api'
            ], function () use ($router){
                $this->mapRoutes($router, $this->routes['api']);
            });

            $router->group([
                'middleware' => 'web'
            ], function () use ($router){
                $this->mapRoutes($router, $this->routes['web']);
            });
        });
    }

}
