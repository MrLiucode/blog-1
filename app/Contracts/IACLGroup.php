<?php
/**
 * IACLGroup.php
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

//TODO:1.生成权限组时不应该直接传数组，应该传 ACLGroupRequest 对象
//TODO:2.权限组中枢数据的生成方法传参应该传 ACLGroup Model 对象(传Model对象可减少查询)
use App\Models\AclGroup;

interface IACLGroup
{
    /**
     * 获取权限组列表
     * @param int $pageSize
     * @param array $withParams
     * @return \App\Models\AclGroup
     */
    public function lists($pageSize = 15, array $withParams = []);

    /**
     * 创建权限组
     * @param array $data
     * @return \App\Models\AclGroup
     */
    public function createGroup(array $data);

    /**
     * 生成权限组中枢
     * @param $groupId
     * @param array $permissionId
     * @return bool
     */
    public function createGroupBackbone($groupId, array $permissionId);

    /**
     * 根据ID获取权限分组
     * @param int $groupId
     * @return \App\Models\AclGroup
     */
    public function getGroupById($groupId);

    /**
     * 更新权限组
     * @param int   $id                 权限组ID
     * @param array $data               权限组数据
     * @return mixed
     */
    public function updateGroup($id, array $data);

    /**
     * 更新权限组中枢数据
     * @param int   $groupId
     * @param array $permissionIdList
     * @return bool|AclGroup
     */
    public function updateGroupBackbone($groupId, array $permissionIdList);

    /**
     * 删除权限组
     * @param int $groupId  权限组ID
     * @return bool
     */
    public function destroyGroup($groupId);

}