<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\IFriendship;
use App\Http\Requests\FriendshipRequest;
use App\Models\Friendship as FriendshipModel;

class FriendshipController extends Controller
{
    const VIEW_INDEX = 'friendship.index';
    const VIEW_EDIT = 'friendship.edit';
    const ROUTE_INDEX = 'admin.friendship.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IFriendship $friendshipService)
    {
        $friendshipList = $friendshipService->getLists();
        return adminView(self::VIEW_INDEX, compact('friendshipList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return adminView(self::VIEW_EDIT);
    }

    /**
     * 保存友情链接
     * @param FriendshipRequest $request
     * @param IFriendship $friendshipService
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(FriendshipRequest $request, IFriendship $friendshipService)
    {
        $result = $friendshipService->store($request);
        return $result ? success(route(self::ROUTE_INDEX), '添加成功!') : error('添加失败!');
    }

    /**编辑友情链接
     * @param FriendshipModel $friendship
     * @return mixed
     */
    public function edit(FriendshipModel $friendship)
    {
        return adminView('friendship.edit', compact('friendship'));
    }

    /**
     * 更新友情链接
     * @param FriendshipRequest $request
     * @param FriendshipModel $model
     * @param IFriendship $friendshipService
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(FriendshipRequest $request, FriendshipModel $model, IFriendship $friendshipService)
    {
        $result = $friendshipService->update($model, $request);
        return $result ? success(route(self::ROUTE_INDEX), '更新成功!') : error("更新失败,请重试!");
    }

    /**
     * 删除友情链接
     * @param FriendshipModel $model
     * @param IFriendship $friendshipService
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy(FriendshipModel $model, IFriendship $friendshipService)
    {
        $result = $friendshipService->destroy($model);
        return $result ? response(['msg' => '删除成功!']) : response("删除失败!", 422);
    }
}
