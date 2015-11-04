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
     * ��ȡ����Ȩ���б�
     * @param int $pageSize
     * @return \App\Models\AclPermission
     */
    public function lists($pageSize = 15);

    /**
     * ��ȡ����δ����Ȩ�޵�·���б�
     * @return array
     */
    public function undistributedRouteList();

    /**
     * ����Ȩ��
     * @param PermissionRequest $request
     * @return \App\Models\AclPermission|null
     */
    public function createPermission(PermissionRequest $request);

    /**
     * ����Ȩ��ID��ȡȨ��
     * @param int $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function getPermissionById($permissionId);

    /**
     * ����ID����Ȩ��
     * @param PermissionRequest $request
     * @param $permissionId
     * @return \App\Models\AclPermission|null
     */
    public function updatePermission(PermissionRequest $request, $permissionId);

    /**
     * ����IDɾ��Ȩ��
     * @param int $permissionId
     * @return int
     */
    public function destroyPermission($permissionId);

}