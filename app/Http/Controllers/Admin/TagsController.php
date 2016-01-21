<?php

namespace App\Http\Controllers\admin;

use App\Contracts\ITag;
use App\Models\Tag as TagModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagsController extends BaseController
{
    const VIEW_INDEX = 'admin.tag.index';
    const VIEW_EDIT = 'admin.tag.edit';
    const ROUTE_INDEX = 'admin.tag.index';
    const ROUTE_EDIT = 'admin.tag.edit';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ITag $tag)
    {
        $tagList = $tag->getList();
        return view(self::VIEW_INDEX, compact('tagList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::VIEW_EDIT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TagRequest $request, ITag $tag)
    {
        $result = $tag->store($request);
        return $result ? success(route(self::ROUTE_INDEX), '添加标签成功!') : error('添加标签失败!');
    }

    /**
     * Display the specified resource.
     *
     * @param  TagModel $tag
     * @return \Illuminate\Http\Response
     */
    public function show(TagModel $tag)
    {
        return view(self::VIEW_EDIT, compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TagModel $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(TagModel $tag)
    {
        return view(self::VIEW_EDIT, compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\TagRequest $request
     * @param  TagModel $tagModel
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TagRequest $request, TagModel $tagModel, ITag $tag)
    {
        $result = $tag->update($tagModel, $request);
        return $result ? success(route(self::ROUTE_INDEX), '更新标签成功!') : error('更新标签失败!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TagModel $tagModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagModel $tagModel, ITag $tag)
    {
        $result = $tag->delete($tagModel);
        return $result ? success(route(self::ROUTE_INDEX), '删除标签成功!') : error('删除标签失败!');
    }
}
