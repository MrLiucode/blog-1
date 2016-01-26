<?php

/**
 * IPermission.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Contracts;

use App\Http\Requests\PermissionRequest;
use App\Models\AclPermission as AclPermissionModel;
use Illuminate\Pagination\LengthAwarePaginator;

interface IACLPermission
{
    /**
     * 权限列表
     * @param int $perPage          需要获取的数量
     * @param array $withParams     预载入的参数
     * @param array $columns        需要查询的参数
     * @return LengthAwarePaginator
     */
    public function lists($perPage = 15, array $withParams = [], $columns = ['*']);

    /**
     * 获取所有未分配权限的路由列表
     * @return array
     */
    public function undistributedRouteList();

    /**
     * 生成权限
     * @param PermissionRequest $request
     * @return AclPermissionModel|null
     */
    public function createPermission(PermissionRequest $request);

    /**
     * 根据ID获取权限
     * @param int $permissionId
     * @return AclPermissionModel|null
     */
    public function getPermission($permissionId);

    /**
     * 更新权限
     * @param PermissionRequest $request
     * @param AclPermissionModel $permissionModel
     * @return AclPermissionModel|null
     */
    public function updatePermission(AclPermissionModel $permissionModel, PermissionRequest $request);

    /**
     * 删除权限
     * @param int $permissionId
     * @return int
     */
    public function destroyPermission(AclPermissionModel $permissionModel);

}