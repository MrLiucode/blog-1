<?php
/**
 * ACLGroup.php
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

use App\Contracts\IACLGroup;
use App\Models\AclGroup as ACLGroupModel;
use App\Models\AclPermission;
use Illuminate\Pagination\LengthAwarePaginator;

class ACLGroup implements IACLGroup
{
    /**
     * 权限组模型
     * @var ACLGroupModel
     */
    protected $groupModel;

    public function __construct(ACLGroupModel $model)
    {
        $this->groupModel = $model;
    }

    /**
     * 获取权限组列表
     * @param int $perPage 需要获取的数量
     * @param array $withParams 预载入参数
     * @param array $columns 需要查询的字段
     * @return LengthAwarePaginator
     */
    public function lists($perPage = 15, array $withParams = [], $columns = ['*'])
    {
        return $this->groupModel->with($withParams)->paginate($perPage, $columns, 'alcGroupPage');
    }


    /**
     * 创建权限组
     * @param array $data
     * @return \App\Models\AclGroup
     */
    public function createGroup(array $data)
    {
        $group = $this->groupModel->where('name', array_get($data, 'name', ''))->first();
        return $group ? false : ACLGroupModel::create($data);
    }

    /**
     * 生成权限组中枢
     * @param $groupId
     * @param array $permissionId
     * @return bool
     */
    public function createGroupBackbone($groupId, array $permissionId)
    {
        if (empty($permissionId)) {
            return true;
        }
        $permissionId = array_values($permissionId);    //去除键
        $permissionResult = AclPermission::whereIn('id', $permissionId)->count();   //根据权限ID数组统计权限数量
        //如果所得到的权限数量跟权限ID组数量不符，则有权限不存在或被删除
        if ($permissionResult != count($permissionId)) {
            return false;
        }
        try {
            $this->getGroup($groupId)->permissions()->attach($permissionId);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 根据ID获取权限分组
     * @param int $groupId
     * @return \App\Models\AclGroup
     */
    public function getGroup($groupId)
    {
        return $this->groupModel->findOrFail($groupId);
    }

    /**
     * 更新权限组
     * @param ACLGroupModel $groupModel
     * @param array $data
     * @return bool|int
     */
    public function updateGroup(ACLGroupModel $groupModel, array $data)
    {
        return $groupModel->update($data);
    }


    /**
     * 更新权限组中枢数据
     * @param int $groupId
     * @param array $permissionIdList
     * @return bool
     */
    public function updateGroupBackbone($groupId, array $permissionIdList)
    {
        $group = $this->getGroup($groupId);
        if (!$group) {
            return false;
        }
        try {
            $group->permissions()->detach();
        } catch (\Exception $e) {
            return false;
        }
        $this->createGroupBackbone($groupId, $permissionIdList);  //更新权限组中枢关系
        return true;
    }

    /**
     * 删除权限组
     * @param \App\Models\AclGroup $groupModel
     * @return bool
     */
    public function destroyGroup(\App\Models\AclGroup $groupModel)
    {
        $groupModel->permissions()->detach();    //移除中枢数据
        return $groupModel->delete();
    }

}