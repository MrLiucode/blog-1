<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\IACLPermission;

use App\Http\Requests;

class ACLPermissionController extends Controller
{

    const VIEW_INDEX = 'acl.permission.index';
    const VIEW_EDIT = 'acl.permission.edit';

    const ROUTE_INDEX = 'admin.acl.permission.index';
    const ROUTE_EDIT = 'alc.permission.edit';

    /**
     * Display a listing of the resource.
     * @param IACLPermission $aclPermission
     * @return \Illuminate\Http\Response
     */
    public function index(IACLPermission $aclPermission )
    {
        $permissionList = $aclPermission->lists();  //获取已分配的权限列表
        $undistributedRouteList = $aclPermission->undistributedRouteList();    //获取未分配的路由列表
        return adminView(self::VIEW_INDEX, compact('permissionList', 'undistributedRouteList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\PermissionRequest  $request
     * @param \App\Contracts\IACLPermission $permission
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PermissionRequest $request, IACLPermission $permission)
    {
        $result = $permission->createPermission($request);
        return $result ? success(route(self::ROUTE_INDEX), '生成权限成功!') : error('生成权限失败!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Contracts\IACLPermission    $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id, IACLPermission $permission)
    {
        return $permission->getPermissionById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Contracts\IACLPermission    $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PermissionRequest $request, $id, IACLPermission $permission)
    {
        $result = $permission->updatePermission($request, $id);
        return $result ? response(['msg' => '更新权限成功!']) : response("更新权限失败!", 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param \App\Contracts\IACLPermission    $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, IACLPermission $permission)
    {
        $result = $permission->destroyPermission($id);
        return $result ? response(['msg' => '删除成功!']) : response("删除失败!", 422);
    }
}
