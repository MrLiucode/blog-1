<?php namespace App\Services;

use App\Contracts\IPaginateCache;

use Route;
use Cache;
use Carbon\Carbon;

class PaginateCache implements IPaginateCache
{
    /**
     * 需要排除缓存的列表
     * @var array
     */
    protected $fillNamespace = [
        'App\Http\Controllers\Admin',
    ];

    /**
     * 获取缓存数据
     * @param $key
     * @param \Closure $callBack
     * @return mixed
     */
    public function get($key, \Closure $callBack)
    {
        $exclude = $this->isExclude();
        $data = $exclude ? $callBack() : Cache::get($key);
        if (is_null($data)) {
            $data = $callBack();
            $time = Carbon::now()->addMinute(30);
            Cache::put($key, $data, $time);
        }
        return $data;
    }

    /**
     * 获取是否在排除列表里
     * @return bool
     */
    protected function isExclude()
    {
        $result = false;
        foreach ($this->fillNamespace as $namespace) {
            if (stripos(Route::current()->getAction()['namespace'], $namespace) !== false) {
                $result = true;
                break;
            }
        }
        return $result;
    }

}