<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Car;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('frontend.layout', function ($view) {
            $carTypes = Car::distinct()->pluck('car_type');
            $view->with('carTypes', $carTypes);
        });
    }
}