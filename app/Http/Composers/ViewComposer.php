<?php namespace App\Http\Composers;

use App\Facades\ViewData;
use App\Repositories\ACLRepo;
use Illuminate\Contracts\View\View;

class ViewComposer
{
    /**
     * 文章分类数据
     * @param View $view
     */
    public function categoryNavData(View $view)
    {
        $view->with('categoryList', ViewData::categoryList());
    }

    /**
     * 标签数据
     * @param View $view
     */
    public function tagListData(View $view)
    {
        $view->with('tagList', ViewData::tagList());
    }

    /**
     * 热门文章数据
     * @param View $view
     */
    public function hotArticleData(View $view)
    {
        $view->with('hotArticleList', ViewData::hotArticleList(5));
    }

    public function friendshipData(View $view)
    {
        $view->with('linkList', ViewData::friendshipList());
    }

    /**
     * 后台菜单
     * @param View $view
     * @param ACLRepo $aclRepo
     */
    public function adminMenu(View $view)
    {
        $view->with('menuList', app(ACLRepo::class)->getMenuListByPermission());
    }

}