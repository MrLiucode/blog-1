<?php namespace App\Contracts;

use App\Http\Requests\SettingRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface ISetting
{
    /**
     * 保存系统配置
     * @param SettingRequest $request
     * @return bool
     */
    public function storeSetting(SettingRequest $request);

    /**
     * 获取配置列表
     * @param int $perPage 需要获取的数量
     * @param array $columns 需要查询的字段
     * @return LengthAwarePaginator
     */
    public function getLists($perPage = 15, $columns = ['*']);

}