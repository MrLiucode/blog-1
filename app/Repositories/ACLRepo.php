<?php
/**
 * PermissionRepo.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Repositories;

use Session;
use Cache;
use Gate;

class ACLRepo
{
    const MENU_CONFIG_CACHE = 'admin.menu.list.cache';
    const ACL_MENU_CACHE = 'admin.acl.menu.cache';

    /**
     * 获取有权限的菜单数组
     * @return array
     */
    public function getMenuListByPermission()
    {
        $menuList = Session::get(self::ACL_MENU_CACHE); //查询菜单数据缓存
        //有菜单数据则直接返回，不管它是否为空数组
        if (!is_null($menuList)) {
            return (array)$menuList;
        }

        $menuList = $this->getMenuConfig(); //获取所有菜单数据
        (!Gate::allows('check-super-permission')) && $menuList = $this->filterMenuByPermission($menuList);  //检查是否有超级权限，如果没有则进行菜单数据过滤
        Session::put(self::ACL_MENU_CACHE, array_filter($menuList));    //保存菜单数据
        return (array)$menuList;
    }

    /**
     * 根据权限过滤菜单数组
     * @param array $menuListArr
     * @return array
     */
    public function filterMenuByPermission(array $menuListArr){
        $menuList = [];
        foreach ($menuListArr as $key => $list) {
            //子菜单存放在child中
            foreach (array_get($list, 'child', []) as $item) {
                //检查菜单路由是否有权限
                if (Gate::allows('route-permission', array_get($item, 'as', ''))) {
                    $menuList[$key]['child'] = $item;
                }
            }
            //如果当前父节点下的子节点不为空，则添加父节点class样式
            array_get($menuList, "{$key}.child") && $menuList['class'] = array_get($list, 'class', '');
        }
        return $menuList;
    }

    /**
     * 获取菜单配置
     * @return array
     */
    public function getMenuConfig()
    {
        $config = Cache::get(self::MENU_CONFIG_CACHE);  //获取菜单配置缓存
        if (is_null($config)) {
            Cache::put(self::MENU_CONFIG_CACHE, config('menu', []), 30);    //保存菜单配置30分组
            return $this->getMenuConfig();  //重新回调当前返回并返回
        }
        return (array)$config;
    }

}