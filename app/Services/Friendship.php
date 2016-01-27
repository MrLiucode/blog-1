<?php namespace App\Services;

use App\Contracts\IFriendship;
use App\Http\Requests\FriendshipRequest;
use App\Models\Friendship as FriendshipModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Friendship implements IFriendship
{
    /**
     * @var FriendshipModel
     */
    protected $friendshipModel;

    public function __construct(FriendshipModel $model)
    {
        $this->friendshipModel = $model;
    }

    /**
     * 获取友情链接信息
     * @param integer $friendshipId
     * @return FriendshipModel
     */
    public function getFriendship($friendshipId)
    {
        return $this->friendshipModel->findOrFail($friendshipId);
    }

    /**
     * 获取友情链接列表
     * @param int $perPage
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getLists($perPage = 15, $columns = ['*'])
    {
        return $this->friendshipModel->paginate($perPage, $columns, 'friendshipPage');
    }

    /**
     * 更新友情链接
     * @param FriendshipModel $friendship
     * @param FriendshipRequest $request
     * @return int
     */
    public function update(FriendshipModel $friendship, FriendshipRequest $request)
    {
        return $friendship->update($request->all());
    }

    /**
     * 保存友情链接
     * @param FriendshipRequest $request
     * @return FriendshipModel
     */
    public function store(FriendshipRequest $request)
    {
        return $this->friendshipModel->create($request->all());
    }

    /**
     * 删除友情链接
     * @param FriendshipModel $friendship
     * @return int
     */
    public function destroy(FriendshipModel $friendship)
    {
        return $friendship->delete();
    }


}