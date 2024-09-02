<?php

namespace App\Providers;

use App\Concerns\WeightConcern;
use App\Services\WeightService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WeightConcern::class, WeightService::class);
    }

    public function boot(): void
    {
        Model::unguard();

        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
