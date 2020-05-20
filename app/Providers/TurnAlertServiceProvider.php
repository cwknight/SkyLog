<?php

namespace App\Providers;

use App\Services\TurnAlertService;
use Illuminate\Support\ServiceProvider;

class TurnAlertServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TurnAlertService::class, function () {
            return new TurnAlertService();
        });
    }
}
