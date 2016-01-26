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

use App\Models\AclGroup as GroupModel;
use Illuminate\Pagination\LengthAwarePaginator;

interface IACLGroup
{
    /**
     * 获取权限组列表
     * @param int $perPage          需要获取的数量
     * @param array $withParams     预载入参数
     * @param array $columns        需要查询的字段
     * @return LengthAwarePaginator
     */
    public function lists($perPage = 15, array $withParams = [], $columns = ['*']);

    /**
     * 创建权限组
     * @param array $data
     * @return GroupModel
     */
    public function createGroup(array $data);

    /**
     * 生成权限中枢
     * @param $groupId
     * @param array $permissionId
     * @return bool
     */
    public function createGroupBackbone($groupId, array $permissionId);

    /**
     * 根据ID获取权限组
     * @param int $groupId
     * @return GroupModel
     */
    public function getGroup($groupId);


    public function updateGroup(GroupModel $groupModel, array $data);

    /**
     * 更新权限组中枢
     * @param int   $groupId
     * @param array $permissionIdList
     * @return bool|GroupModel
     */
    public function updateGroupBackbone($groupId, array $permissionIdList);

    /**
     * 删除权限组
     * @param GroupModel $groupModel
     * @return bool
     */
    public function destroyGroup(GroupModel $groupModel);

}