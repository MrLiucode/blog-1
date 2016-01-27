<?php namespace App\Http\Composers;

use App\Facades\ViewData;
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

}