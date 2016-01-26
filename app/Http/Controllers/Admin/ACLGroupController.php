<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\IACLGroup;
use App\Contracts\IACLPermission;
use App\Models\AclGroup;
use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Illuminate\View\View;

class ACLGroupController extends BaseController
{

    const VIEW_INDEX = 'acl.group.index';
    const VIEW_CREATE = 'acl.group.edit';
    const VIEW_EDIT = 'acl.group.edit';

    const ROUTE_INDEX = 'admin.acl.group.index';

    /**
     * Display a listing of the resource.
     * @param IACLGroup $aclGroup
     * @return View
     */
    public function index(IACLGroup $aclGroup)
    {
        $groupList = $aclGroup->lists(15, ['permissions']);    //获取所有的权限组
        return adminView(self::VIEW_INDEX, compact('groupList'));
    }

    /**
     * Show the form for creating a new resource.
     * @param IACLPermission $aclPermission
     * @return View
     */
    public function create(IACLPermission $aclPermission)
    {
        $permissionList = $aclPermission->lists(9999);
        return adminView(self::VIEW_CREATE, compact('permissionList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\ACLGroupRequest $request
     * @param   IACLGroup $alcGroup
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ACLGroupRequest $request, IACLGroup $alcGroup)
    {
        DB::beginTransaction();
        $groupResult = $alcGroup->createGroup([
            'name' => $request->name,
            'description' => $request->description
        ]);
        if (!$groupResult) {
            DB::rollBack();
            return error('生成权限组失败!');
        }

        $permissionIdList = $request->permission_id;    //获取权限ID数组
        if (!$alcGroup->createGroupBackbone($groupResult->id, (array)$permissionIdList)) {
            DB::rollBack();
            return error('生成权限映射失败!');
        }
        DB::commit();
        return success(route(self::ROUTE_INDEX), '创建权限组成功!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  AclGroup $group
     * @param   IACLPermission $aclPermission
     * @return  View
     */
    public function edit(AclGroup $group, IACLPermission $aclPermission)
    {
        $permissionList = $aclPermission->lists(9999);
        $groupPermissionList = array_get_value($group->permissions->toArray(), 'id');
        return adminView(self::VIEW_EDIT, compact('group', 'permissionList', 'groupPermissionList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\ACLGroupRequest $request
     * @param  int $id
     * @param   IACLGroup $alcGroup
     * @return View
     */
    public function update(Requests\ACLGroupRequest $request, $id, IACLGroup $alcGroup)
    {
        $groupData = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $permissionIdList = (array)$request->permission_id;    //获取权限ID数组
        DB::beginTransaction();
        if (!$alcGroup->updateGroup($id, $groupData) || !$alcGroup->updateGroupBackbone($id, $permissionIdList)) {
            DB::rollBack();
            return error("更新权限组数据失败!");
        }
        DB::commit();

        return success(route(self::ROUTE_INDEX), '更新权限组成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  AclGroup $groupModel
     * @param  IACLGroup $aclGroupService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AclGroup $groupModel, IACLGroup $aclGroupService)
    {
        $result = $aclGroupService->destroyGroup($groupModel);
        return $result ? response(['msg' => '删除权限组成功!']) : response("权限组不存在或已删除!", 422);
    }
}
