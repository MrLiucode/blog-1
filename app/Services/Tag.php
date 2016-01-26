<?php namespace App\Services;

use App\Contracts\ITag;
use App\Http\Requests\TagRequest;
use App\Models\Tag as TagModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Tag implements ITag
{
    const ERROR_DEL = '该标签下尚存在，请先删除对应的文章标签，再进行删除标签操作!';

    /**
     * @var TagModel $tagModel
     */
    protected $tagModel;

    /**
     * @var string 错误消息
     */
    protected $errorMsg;

    public function __construct(TagModel $model)
    {
        $this->tagModel = $model;
    }

    /**
     * 获取标签列表
     * @param int $perPage 页码
     * @param string $selectParams 需要查询的参数
     * @param array $withParams 深入查询的参数
     * @param array $columns
     * @return \Illuminate\Pagination\LengthAwarePaginator|null
     */
    public function getList($perPage = 15, $withParams = [], $columns = ['*'])
    {
        return $this->tagModel->with($withParams)->paginate($perPage, $columns, 'tagPage');
    }

    /**
     * 根据标签获取文章
     * @param TagModel $model 标签模型
     * @param int $perPage 获取的数量
     * @param array $columns 需要获取的值
     * @return LengthAwarePaginator
     */
    public function getTagArticle(TagModel $model, $perPage = 15, $columns = ['*'])
    {
        return $model->article()->paginate($perPage, $columns, 'tagArticlePage');
    }


    /**
     * 根据ID获取标签
     * @param int $tagId
     * @return TagModel
     */
    public function getTag($tagId)
    {
        return $this->tagModel->findOrFail($tagId);
    }


    /**
     * 保存标签
     * @param TagRequest $request
     * @return TagModel|null
     */
    public function store(TagRequest $request)
    {
        return $this->tagModel->create($request->all());
    }

    /**
     * 更新标签
     * @param TagModel $tag
     * @param TagRequest $request
     * @return TagModel
     */
    public function update(TagModel $tag, TagRequest $request)
    {
        return $tag->update($request->all());
    }

    /**
     * 删除标签
     * @param TagModel $tag
     * @return int|null
     */
    public function delete(TagModel $tag)
    {
        //如果该标签下有文章，则不给删除
        if ($tag->article()) {
            $this->errorMsg = self::ERROR_DEL;
            return false;
        }
        return $tag->delete();
    }

    /**
     * 获取错误消息
     * @return string
     */
    public function getError()
    {
        return $this->errorMsg;
    }
}