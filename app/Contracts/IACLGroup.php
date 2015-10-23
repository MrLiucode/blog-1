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

//TODO:1.����Ȩ����ʱ��Ӧ��ֱ�Ӵ����飬Ӧ�ô� ACLGroupRequest ����
//TODO:2.Ȩ�����������ݵ����ɷ�������Ӧ�ô� ACLGroup Model ����(��Model����ɼ��ٲ�ѯ)
use App\Models\AclGroup;

interface IACLGroup
{
    /**
     * ��ȡȨ�����б�
     * @param int $pageSize
     * @param array $withParams
     * @return \App\Models\AclGroup
     */
    public function lists($pageSize = 15, array $withParams = []);

    /**
     * ����Ȩ����
     * @param array $data
     * @return \App\Models\AclGroup
     */
    public function createGroup(array $data);

    /**
     * ����Ȩ��������
     * @param $groupId
     * @param array $permissionId
     * @return bool
     */
    public function createGroupBackbone($groupId, array $permissionId);

    /**
     * ����ID��ȡȨ�޷���
     * @param int $groupId
     * @return \App\Models\AclGroup
     */
    public function getGroupById($groupId);

    /**
     * ����Ȩ����
     * @param int   $id                 Ȩ����ID
     * @param array $data               Ȩ��������
     * @return mixed
     */
    public function updateGroup($id, array $data);

    /**
     * ����Ȩ������������
     * @param int   $groupId
     * @param array $permissionIdList
     * @return bool|AclGroup
     */
    public function updateGroupBackbone($groupId, array $permissionIdList);

    /**
     * ɾ��Ȩ����
     * @param int $groupId  Ȩ����ID
     * @return bool
     */
    public function destroyGroup($groupId);

}