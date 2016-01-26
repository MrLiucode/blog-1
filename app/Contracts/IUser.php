<?php namespace App\Contracts;

use App\Http\Requests\UserRequest;
use App\Models\User as UserModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IUser
{
    /**
     * 获取用户列表
     * @param int $perPage
     * @param array $withColumns
     * @param array $selectColumns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUserLists($perPage = 15, $withColumns = [], $selectColumns = ['*']);

    /**
     * 获取该用户下的所有文章
     * @param UserModel $user 用户
     * @param int $perPage 获取的数量
     * @param array $columns 需要查询的Filed
     * @return LengthAwarePaginator
     */
    public function getUserArticle(UserModel $user, $perPage = 15, $columns = ['*']);

    /**
     * 根据ID获取用户
     * @param int $userId
     * @return UserModel
     */
    public function getUser($userId);

    /**
     * 更新用户信息
     * @param UserModel $user
     * @param UserRequest $request
     * @return mixed
     */
    public function updateUser(UserModel $user, UserRequest $request);

    /**
     * 保存用户信息
     * @param UserRequest $request
     * @return UserModel
     */
    public function storeUser(UserRequest $request);

    /**
     * 删除用户
     * @param UserModel $user
     * @return bool
     */
    public function destroyUser(UserModel $user);

}