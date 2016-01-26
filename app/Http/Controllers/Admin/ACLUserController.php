<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\IACLGroup;

use App\Contracts\IUser;
use App\Http\Requests;
use App\Http\Requests\UserRequest as userRequest;
use App\Models\User as UserModel;

class ACLUserController extends BaseController
{

    const VIEW_INDEX = 'acl.user.index';
    const VIEW_CREATE = 'acl.user.edit';
    const VIEW_EDIT = 'acl.user.edit';

    const ROUTE_INDEX = 'admin.acl.user.index';

    /**
     * Display a listing of the resource.
     *
     * @param IUser $userService
     * @return \Illuminate\Http\Response
     */
    public function index(IUser $userService)
    {
        $userList = $userService->getUserLists(15, ['userInfo', 'groups']);
        $statusMap = config('admin-acl.user_status');
        return adminView(self::VIEW_INDEX, compact('userList', 'statusMap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param IACLGroup $group
     * @return \Illuminate\Http\Response
     */
    public function create(IACLGroup $group)
    {
        $groupList = $group->lists(9999);
        return adminView(self::VIEW_CREATE, compact('groupList'));
    }

    /**
     * 保存用户信息
     * @param Requests\UserRequest $request
     * @param IUser $userService
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, IUser $userService)
    {
        $result = $userService->storeUser($request);
        return $result ? success(route(self::ROUTE_INDEX), '添加用户成功!') : error('保存失败!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO:用户信息待开发
    }

    /**
     * 编辑用户
     * @param UserModel $user
     * @return mixed
     */
    public function edit(UserModel $user)
    {
        return adminView(self::VIEW_EDIT, compact('user'));
    }

    /**
     * 更新用户
     * @param UserModel $user
     * @param Requests\UserRequest $request
     * @param IUser $userService
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UserModel $user, Requests\UserRequest $request, IUser $userService)
    {
        $result = $userService->updateUser($user, $request);
        return $result ? success(route(self::ROUTE_INDEX), '修改用户信息成功!') : error('保存用户信息失败!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserModel $user
     * @param   IUser $userService
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserModel $user, IUser $userService)
    {
        $result = $userService->destroyUser($user);
        return $result ? response(['msg' => '删除用户成功!']) : response("删除用户失败!", 422);
    }
}
