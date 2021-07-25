<?php

namespace App\Providers;

use App\Models\Blog;
use App\Observers\BlogObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::isProduction()) {
            URL::forceScheme('https');
        }
        // 分頁使用Bootstrap
        Paginator::useBootstrap();

        // 註冊觀察者
        Blog::observe(BlogObserver::class);
    }
}
