<?php

namespace App\Providers;

use App\Concerns\DistanceConcern;
use App\Concerns\DurationConcern;
use App\Concerns\WeightConcern;
use App\Services\DistanceService;
use App\Services\DurationService;
use App\Services\WeightService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WeightConcern::class, WeightService::class);
        $this->app->bind(DistanceConcern::class, DistanceService::class);
        $this->app->bind(DurationConcern::class, DurationService::class);
    }

    public function boot(): void
    {
        Model::unguard();

        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
