<?php namespace App\Services;

use App\Contracts\ISetting;
use App\Http\Requests\SettingRequest;
use App\Models\Setting as SettingModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Setting implements ISetting
{

    protected $settingModel;
    /**
     * 可设置的KEY名单列表
     * @var array
     */
    protected $settingFiled = [
        'site_name', 'keyword', 'description', 'author', 'icp', 'copyright', 'motto'
    ];

    public function __construct(SettingModel $model)
    {
        $this->settingModel = $model;
    }

    /**
     * 保存系统配置
     * @param SettingRequest $request
     * @return bool
     */
    public function storeSetting(SettingRequest $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if (in_array($key, $this->settingFiled)) {
                $this->settingModel->firstOrNew(compact('key', 'value'))->save();
            }
        }
        return true;
    }

    /**
     * 获取配置列表
     * @param int $perPage 需要获取的数量
     * @param array $columns 需要查询的字段
     * @return LengthAwarePaginator
     */
    public function getLists($perPage = 15, $columns = ['*'])
    {
        return $this->settingModel->paginate($perPage, $columns, 'settingPage');
    }


}