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

interface IACLPermission
{
    /**
     * 获取所有权限列表
     * @param int $pageSize
     * @return \App\Models\AclPermission
     */
    public function lists($pageSize = 15);

    /**
     * 获取所有未分配权限的路由列表
     * @return array
     */
    public function undistributedRouteList();

    /**
     * 生成权限
     * @param PermissionRequest $request
     * @return \App\Models\AclPermission|null
     */
    public function createPermission(PermissionRequest $request);

    /**
     * 根据权限ID获取权限
     * @param int $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function getPermissionById($permissionId);

    /**
     * 根据ID更新权限
     * @param PermissionRequest $request
     * @param $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function updatePermission(PermissionRequest $request, $permissionId);

    /**
     * 根据ID删除权限
     * @param int $permissionId
     * @return int
     */
    public function destroyPermission($permissionId);

}