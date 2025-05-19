<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrap();

        // $mailViewsPath = resource_path('views/vendor/mail');

        // if (File::isDirectory($mailViewsPath)) {
        //     View::addNamespace('mail', $mailViewsPath);
        // }
        $mailPath = resource_path('views/vendor/mail');

        if (File::isDirectory($mailPath)) {
            View::addNamespace('mail', $mailPath);
        }
    }
}