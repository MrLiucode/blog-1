<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\IACLGroup;
use App\Contracts\IACLUser;

use App\Http\Requests;

class ACLUserController extends BaseController
{

    const VIEW_INDEX = 'acl.user.index';
    const VIEW_CREATE = 'acl.user.edit';
    const VIEW_EDIT = 'acl.user.edit';

    const ROUTE_INDEX = 'admin.acl.user.index';

    /**
     * Display a listing of the resource.
     *
     * @param IACLUser $user
     * @return \Illuminate\Http\Response
     */
    public function index(IACLUser $user)
    {
        $userList = $user->lists(15, ['userInfo', 'groups']);
        $statusMap = config('admin-acl.user_status');
//        foreach($userList as $item){
//            dump($item->userInfo->mobile);
//        }
//
//        dd($userList->toArray());
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
     * Store a newly created resource in storage.
     *
     * @param  Requests\UserRequest  $request
     * @param   IACLUser $user
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRequest $request, IACLUser $user)
    {
        $result = $user->store($request);
        return $result ? success(route(self::ROUTE_INDEX), '添加用户成功!') : error('保存失败!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //TODO:用户信息待开发
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param   IACLUser $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id, IACLUser $user)
    {
        $user = $user->getUserById($id);
        return adminView(self::VIEW_EDIT, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  IACLUser $user
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserRequest $request, $id, IACLUser $user)
    {
        $userData = $user->getUserById($id);
        $result = $user->update($userData, $request);
        return $result ? success(route(self::ROUTE_INDEX), '修改用户信息成功!') : error('保存用户信息失败!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param   IACLUser $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, IACLUser $user)
    {
        $result = $user->destroy($id);
        return $result ? response(['msg' => '删除用户成功!']) : response("用户不存在或已删除!", 422);
    }
}
