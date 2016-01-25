<?php namespace App\Services;

use App\Contracts\ITag;
use App\Http\Requests\TagRequest;
use App\Models\Tag as TagModel;

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
     * @return TagModel|null
     */
    public function getList($perPage = 15, $selectParams = '*', $withParams = [])
    {
        return $this->tagModel->select($selectParams)->with($withParams)->paginate($perPage);
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