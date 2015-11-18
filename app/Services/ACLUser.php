<?php
/**
 * ACLUser.php
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

use App\Contracts\IACLUser;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\UserInfo;

class ACLUser implements IACLUser
{
    /**
     * 获取用户列表
     * @param int $pageSize 页码
     * @param array $withParams 附加参数
     * @return \App\Models\User
     */
    public function lists($pageSize = 15, array $withParams = [])
    {
        return User::with($withParams)->paginate($pageSize);
    }

    /**
     * 获取用户信息
     * @param $userId
     * @return \App\Models\User
     */
    public function getUserById($userId)
    {
        return User::find($userId);
    }

    /**
     * 保存用户数据
     * @param UserRequest $request
     * @return \App\Models\User
     */
    public function store(UserRequest $request)
    {
        $data = [
            'name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password), 'status' => intval($request->status)
        ];
        return User::create($data);
    }

    /**
     * 更新用户数据
     * @param \App\Models\User $user
     * @param UserRequest $request
     * @return int|null
     */
    public function update(\App\Models\User $user, UserRequest $request)
    {
        $data = ['name' => $request->name, 'status' => $request->status];
        $request->password && $data['password'] = bcrypt($request->password);
        return $user->update($data);
    }

    /**
     * 删除用户
     * @param int   $userId
     * @return int
     */
    public function destroy($userId)
    {
        UserInfo::where('user_id', $userId)->delete();
        return User::destroy($userId);
    }

}