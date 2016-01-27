<?php namespace App\Contracts;

interface IPaginateCache
{
    /**
     * 获取缓存数据
     * @param $key
     * @param \Closure $callBack
     * @return mixed
     */
    public function get($key, \Closure $callBack);
}