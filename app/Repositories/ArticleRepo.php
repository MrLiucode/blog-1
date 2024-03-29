<?php namespace App\Repositories;

use App\Models\Article as ArticleModel;

class ArticleRepo
{
    /**
     * @var ArticleModel $articleModel
     */
    protected $articleModel;

    /**
     * @var array 模型参数
     */
    protected $articleField = ['title', 'content', 'status', 'published_at'];

    public function __construct(ArticleModel $model)
    {
        $this->articleModel = $model;
    }

    /**
     * 保存文章
     * @param array $articleData
     * @return int|null
     */
    public function storeArticle(array $articleData)
    {
        $articleData = $this->getAllFiledData($articleData);   //获取文章数据
        $articleData['user_id'] = \Auth::user()->id;
        return $this->articleModel->create($articleData);
    }

    protected function getAllFiledData(array $data)
    {
        return array_only($data, $this->articleField);
    }

}