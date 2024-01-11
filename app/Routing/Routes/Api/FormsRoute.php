<?php

declare(strict_types=1);

namespace App\Routing\Routes\Api;

use App\Http\Controllers\Api\Forms\FeedbackFormController;
use App\Routing\Contracts\RouteRegistrar;
use Illuminate\Contracts\Routing\Registrar;

class FormsRoute implements RouteRegistrar
{
    public function map(Registrar $router): void
    {
        $router->group([
            'name' => 'forms.',
            'prefix' => 'forms'
        ], function () use ($router){
            $router->resource('feedback', FeedbackFormController::class)->withTrashed();
        });
    }
}
