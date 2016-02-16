<?php namespace App\Services;

use App\Contracts\IUser;
use App\Http\Requests\UserRequest;
use App\Models\User as UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use DB;

class User implements IUser
{

    /**
     * 用户模型
     * @var UserModel
     */
    protected $userModel;

    public function __construct(UserModel $model)
    {
        $this->userModel = $model;
    }

    /**
     * 获取用户列表
     * @param int $perPage
     * @param array $withColumns
     * @param array $selectColumns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUserLists($perPage = 15, $withColumns = [], $selectColumns = ['*'])
    {
        return $this->userModel->with($withColumns)->paginate($perPage, $selectColumns, 'aclUserPage');
    }


    /**
     * 获取该用户下的所有文章
     * @param UserModel $user 用户
     * @param int $perPage 获取的数量
     * @param array $columns 需要查询的Filed
     * @return LengthAwarePaginator
     */
    public function getUserArticle(UserModel $user, $perPage = 15, $columns = ['*'])
    {
        return $user->article()->published()->paginate($perPage, $columns, 'userArticle');
    }

    /**
     * 根据ID获取用户
     * @param int $userId
     * @return UserModel
     */
    public function getUser($userId)
    {
        return $this->userModel->findOrFail($userId);
    }

    /**
     * 更新用户信息
     * @param UserModel $user
     * @param UserRequest $request
     * @return mixed
     */
    public function updateUser(UserModel $user, UserRequest $request)
    {
        $data = ['name' => $request->name, 'status' => $request->status];
        $request->password && $data['password'] = bcrypt($request->password);
        return $user->update($data);
    }

    /**
     * 保存用户信息
     * @param UserRequest $request
     * @return mixed
     */
    public function storeUser(UserRequest $request)
    {
        $data = [
            'name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password), 'status' => intval($request->status)
        ];
        return $this->userModel->create($data);
    }

    /**
     * 删除用户
     * @param UserModel $user
     * @return int
     */
    public function destroyUser(UserModel $user)
    {
        $result = false;
        DB::beginTransaction();
        $user->userInfo()->delete();
        if ($user->delete()) {
            $result = true;
            DB::commit();
        }
        DB::rollBack();
        return $result;
    }

}