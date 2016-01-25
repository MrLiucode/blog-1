<?php namespace App\Providers;

use App\Services\ViewData;
use Illuminate\Support\ServiceProvider;

class DataViewServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DataView', function () {
            return new ViewData;
        });
        parent::register();
    }

}