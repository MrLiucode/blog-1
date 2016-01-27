<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $theme = config('app.theme');
        view()->composer("{$theme}.widget.navbar", '\App\Http\Composers\ViewComposer@categoryNavData');
        view()->composer("{$theme}.widget.hotArticle", '\App\Http\Composers\ViewComposer@hotArticleData');
        view()->composer("{$theme}.widget.tagCloud", '\App\Http\Composers\ViewComposer@tagListData');
        view()->composer("{$theme}.widget.friendship", '\App\Http\Composers\ViewComposer@friendshipData');
        view()->composer("admin.widget.sidebar", '\App\Http\Composers\ViewComposer@adminMenu');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
