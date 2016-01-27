<?php

namespace App\Providers;

use App\Contracts\IArticle;
use App\Contracts\ICategory;
use App\Contracts\ITag;
use App\Contracts\IUser;
use App\Contracts\IACLGroup;
use App\Contracts\IFriendship;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        //文章路由模型
        $router->bind('article', function ($articleId) {
            return app(IArticle::class)->getArticle($articleId);
        });

        //标签路由模型
        $router->bind('tag', function ($tagId) {
            return app(ITag::class)->getTag($tagId);
        });

        //文章分类路由模型
        $router->bind('category', function ($categoryId) {
            return app(ICategory::class)->getCategory($categoryId);
        });

        /**
         * 用户路由模型
         */
        $router->bind('user', function ($userId) {
            return $this->app->make(IUser::class)->getUser($userId);
        });

        /**
         * 权限组路由模型
         */
        $router->bind('group', function ($groupId) {
            return $this->app->make(IACLGroup::class)->getGroup($groupId);
        });

        /**
         * 友情链接路由模型
         */
        $router->bind('friendship', function ($friendshipId) {
            return $this->app->make(IFriendship::class)->getFriendship($friendshipId);
        });

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
