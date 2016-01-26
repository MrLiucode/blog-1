<?php namespace App\Contracts;

use App\Http\Requests\TagRequest;
use App\Models\Tag as TagModel;
use Illuminate\Pagination\LengthAwarePaginator;

interface ITag
{
    /**
     * 获取标签列表
     * @param int $perPage 页码
     * @param string $selectParams 需要查询的参数
     * @param array $withParams 深入查询的参数
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getList($perPage = 15, $withParams = [], $columns = ['*']);

    /**
     * 根据标签获取文章
     * @param TagModel $model   标签模型
     * @param int $perPage      获取的数量
     * @param array $columns    需要获取的值
     * @return LengthAwarePaginator
     */
    public function getTagArticle(TagModel $model, $perPage = 15, $columns = ['*']);

    /**
     * 根据ID获取标签
     * @param int $tagId
     * @return TagModel
     */
    public function getTag($tagId);

    /**
     * 保存标签
     * @param TagRequest $request
     * @return TagModel|null
     */
    public function store(TagRequest $request);

    /**
     * 更新标签
     * @param TagModel $tag
     * @param TagRequest $request
     * @return TagModel
     */
    public function update(TagModel $tag, TagRequest $request);

    /**
     * 删除标签
     * @param TagModel $tag
     * @return int|null
     */
    public function delete(TagModel $tag);

}