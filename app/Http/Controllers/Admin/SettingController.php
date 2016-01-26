<?php

namespace App\Http\Controllers\admin;

use App\Contracts\ISetting;

use App\Http\Requests;

class SettingController extends BaseController
{

    const VIEW_INDEX = 'setting.set';

    /**
     * Display a listing of the resource.
     *
     * @param ISetting $settingService
     * @return \Illuminate\Http\Response
     */
    public function index(ISetting $settingService)
    {
        $setting = $settingService->getLists(999);
        $setting = array_key_value($setting->toArray()['data'], 'key', 'value');
        return adminView(self::VIEW_INDEX, compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\SettingRequest $request
     * @param ISetting $settingService
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SettingRequest $request, ISetting $settingService)
    {
        $result = $settingService->storeSetting($request);
        return $result ? success(route('admin.setting.index'), '更新系统配置成功!') : error('更新系统配置失败!');
    }
}
