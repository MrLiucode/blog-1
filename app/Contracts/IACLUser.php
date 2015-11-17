<?php
/**
 * IUser.php
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

use App\Http\Requests\UserRequest;

interface IACLUser
{
    /**
     * ��ȡ�û��б�
     * @param int $pageSize ҳ��
     * @param array $withParams ���Ӳ���
     * @return \App\Models\User
     */
    public function lists($pageSize = 15, array $withParams = []);

    /**
     * ��ȡ�û���Ϣ
     * @param $userId
     * @return \App\Models\User
     */
    public function getUserById($userId);

    /**
     * �����û�����
     * @param UserRequest $request
     * @return \App\Models\User
     */
    public function store(UserRequest $request);

    /**
     * �����û�����
     * @param \App\Models\User $user
     * @param UserRequest $request
     * @return int|null
     */
    public function update(\App\Models\User $user, UserRequest $request);

    /**
     * ɾ���û�
     * @param int   $userId
     * @return int
     */
    public function destroy($userId);

}