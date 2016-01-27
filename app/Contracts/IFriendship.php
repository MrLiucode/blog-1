<?php namespace App\Contracts;

use App\Http\Requests\FriendshipRequest;
use App\Models\Friendship as FriendshipModel;
use Illuminate\Pagination\LengthAwarePaginator;

interface IFriendship
{
    /**
     * 获取友情链接信息
     * @param integer $friendshipId
     * @return FriendshipModel
     */
    public function getFriendship($friendshipId);

    /**
     * 获取友情链接列表
     * @param int $perPage
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getLists($perPage = 15, $columns = ['*']);

    /**
     * 更新友情链接
     * @param FriendshipModel $friendship
     * @param FriendshipRequest $request
     * @return int
     */
    public function update(FriendshipModel $friendship, FriendshipRequest $request);

    /**
     * 保存友情链接
     * @param FriendshipRequest $request
     * @return FriendshipModel
     */
    public function store(FriendshipRequest $request);

    /**
     * 删除友情链接
     * @param FriendshipModel $friendship
     * @return int
     */
    public function destroy(FriendshipModel $friendship);

}