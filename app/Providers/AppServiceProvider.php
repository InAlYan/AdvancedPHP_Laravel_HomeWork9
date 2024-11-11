<?php

namespace App\Providers;

use App\Events\NewsHidden;
use App\Listeners\NewsHiddenListener;
use App\Models\News;
use App\Observers\NewsObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);
    }
}
