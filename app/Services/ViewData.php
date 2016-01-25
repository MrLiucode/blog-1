<?php namespace App\Services;

use App\Contracts\ICategory;
use App\Contracts\ITag;
use App\Contracts\IArticle;

class ViewData
{
    /**
     * 获取分类列表
     * @param string $num
     * @return mixed
     */
    public function categoryList($num = '*')
    {
        return app(ICategory::class)->lists($this->getNum($num));
    }

    /**
     * 获取标签列表
     * @param string $num
     * @return mixed
     */
    public function tagList($num = '*')
    {
        return app(ITag::class)->getList($this->getNum($num));
    }

    public function hotArticleList($num = '*')
    {
        return app(IArticle::class)->hotList($this->getNum($num));
    }

    /**
     * 获取整型数量
     * @param string $num
     * @return int
     */
    protected function getNum($num = '*')
    {
        return $num === '*' ? 9999 : intval($num);
    }

}