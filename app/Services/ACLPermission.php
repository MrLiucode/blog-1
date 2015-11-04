<?php
/**
 * ACLPermission.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Services;

use App\Contracts\IACLPermission;
use App\Http\Requests\PermissionRequest;
use App\Models\AclPermission as PermissionModel;

class ACLPermission implements IACLPermission
{
    /**
     * 获取所有权限列表
     * @param int $pageSize
     * @return \App\Models\AclPermission
     */
    public function lists($pageSize = 15)
    {
        return PermissionModel::paginate($pageSize);
    }

    /**
     * 获取所有未分配权限的路由列表
     * @return array
     */
    public function undistributedRouteList()
    {
        $list = [];
        $permissionList = PermissionModel::select('ident')->get();
        if ($permissionList) {
            $permissionList = array_pluck($permissionList, 'ident');
            $list = array_diff($this->getRouteAliasList(), $permissionList);
        }
        return $list;
    }


    /**
     * 获取路由别名列表
     * @return array
     */
    protected function getRouteAliasList()
    {
        $routeList = $this->getRouteList(); //获取所有的路由列表
        $routeAliasList = array_filter(array_pluck($routeList, 'as')); //获取所有的路由别名
        return array_values($routeAliasList);
    }

    /**
     * 获取所有的路由列表
     * @return array
     */
    protected function getRouteList()
    {
        $routeList = [];
        foreach (\Route::getRoutes() as $item) {
            $routeList[] = $item->getAction();
        }
        return $routeList;
    }

    /**
     * 生成权限
     * @param PermissionRequest $request
     * @return \App\Models\AclPermission|null
     */
    public function createPermission(PermissionRequest $request)
    {
        $data = array_get_all(['ident', 'description'], $request->all());
        return PermissionModel::create($data);
    }

    /**
     * 根据权限ID获取权限
     * @param int $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function getPermissionById($permissionId)
    {
        return PermissionModel::find($permissionId);
    }

    /**
     * 根据ID删除权限
     * @param int $permissionId
     * @return int
     */
    public function destroyPermission($permissionId)
    {
        return PermissionModel::destroy($permissionId);
    }

    /**
     * 根据ID更新权限
     * @param PermissionRequest $request
     * @param $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function updatePermission(PermissionRequest $request, $permissionId)
    {
        $permission = PermissionModel::find($permissionId);
        return $permission ? $permission->update($request->all()) : $permission;
    }

}