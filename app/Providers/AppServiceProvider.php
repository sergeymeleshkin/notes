<?php

namespace App\Providers;

use App\Http\Kernel;
use Carbon\CarbonInterval;
use Domain\Auth\Repositories\GroupUsers\GroupUsersCacheRepository;
use Domain\Auth\Repositories\GroupUsers\GroupUsersRepositoryInterface;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            GroupUsersRepositoryInterface::class,
            GroupUsersCacheRepository::class
        );

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::whenQueryingForLongerThan(1, function ( Connection $connection) {
            logger()
                ->channel('telegram')
                ->debug('whenQueryingForLongerThan:' . $connection->query()->toSql());
        });

        $kernel = app(Kernel::class);
        $kernel->whenRequestLifecycleIsLongerThan(
            CarbonInterval::millisecond(9),
            function (){
                logger()
                    ->channel('telegram')
                    ->debug('whenRequestLifecycleIsLongerThan:' . request()->url());
            }
        );
    }
}
