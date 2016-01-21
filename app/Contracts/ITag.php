<?php namespace App\Contracts;

use App\Http\Requests\TagRequest;
use App\Models\Tag as TagModel;

interface ITag
{
    /**
     * 获取标签列表
     * @param int $perPage 页码
     * @param string $selectParams 需要查询的参数
     * @param array $withParams 深入查询的参数
     * @return TagModel|null
     */
    public function getList($perPage = 15, $selectParams = '*', $withParams = []);

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