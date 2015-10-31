<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
        //文章分类接口绑定
        $this->app->bind(
            \App\Contracts\ICategory::class,
            \App\Services\Category::class
        );

//        /**
//         * 文章分类处理接口绑定
//         */
//        $this->app->bind(
//            \App\Contracts\ArticleCategory::class,
//            \App\Services\ArticleCategory::class
//        );
//
//        /**
//         * 文章处理接口绑定
//         */
//        $this->app->bind(
//            \App\Contracts\Article::class,
//            \App\Services\Article::class
//        );
    }
}
