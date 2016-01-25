<?php

namespace App\Providers;

use App\Services\ViewData;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindingInterface();  //绑定接口
        $this->bindFacade();    //绑定外观
    }

    protected function bindingInterface()
    {
        //绑定权限服务
        $this->app->bind(
            \App\Contracts\IACLPermission::class,
            \App\Services\ACLPermission::class
        );

        //绑定权限组服务
        $this->app->bind(
            \App\Contracts\IACLGroup::class,
            \App\Services\ACLGroup::class
        );

        //绑定用户管理服务
        $this->app->bind(
            \App\Contracts\IACLUser::class,
            \App\Services\ACLUser::class
        );

        $this->app->bind(
            \App\Contracts\IErrorLog::class,
            \App\Services\ErrorLog::class
        );

        //文章分类接口绑定
        $this->app->bind(
            \App\Contracts\ICategory::class,
            \App\Services\Category::class
        );

        //标签接口绑定
        $this->app->bind(
            \App\Contracts\ITag::class,
            \App\Services\Tag::class
        );

        $this->app->bind(
            \App\Contracts\IArticle::class,
            \App\Services\Article::class
        );
    }

    public function bindFacade()
    {
        $this->app->bind('ViewData', function () {
            return new ViewData();
        });
    }

}
