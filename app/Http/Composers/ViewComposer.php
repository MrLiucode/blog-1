<?php namespace App\Http\Composers;

use App\Facades\ViewData;
use App\Repositories\ACLRepo;
use App\Contracts\ICategory;
use App\Contracts\ITag;
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
     */
    public function adminMenu(View $view)
    {
        $view->with('menuList', app(ACLRepo::class)->getMenuListByPermission());
    }

    public function categoryList(View $view)
    {
        $categoryList = app(ICategory::class)->lists()->toArray()['data'];
        $view->with('categoryList', array_key_value((array)$categoryList, 'id', 'name'));
    }

    public function tagList(View $view)
    {
        $tagList = app(ITag::class)->getList(9999)->toArray()['data'];
        $view->with('tagList', array_key_value((array)$tagList, 'id', 'name'));
    }

}