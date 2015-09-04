@extends('admin.layout.base')
@section('title')文章列表@stop
@section('page-header')
<!-- page header -->
<div class="pageheader">
    <h2><i class="fa fa-tachometer"></i> 文章列表 </h2>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li>当前位置</li>
            <li><a href="{{url()}}">首页</a></li>
            <li class="active">文章列表</li>
        </ol>
    </div>


</div>
<!-- /page header -->
@stop

@section('main')
        <!-- content main container -->
<div class="main">
    <div class="row">

        <div class="col-md-12">

            <!-- tile -->
            <section class="tile color transparent-black">



                <!-- tile header -->
                <div class="tile-header">
                    <h1><strong>Advanced</strong> Table</h1>
                    <div class="search">
                        <input type="text" placeholder="Search...">
                    </div>
                    <div class="controls">
                        <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                        <a href="#" class="remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <!-- /tile header -->



                <!-- tile body -->
                <div class="tile-body nopadding">

                    <table class="table table-bordered table-sortable">
                        <thead>
                        <tr>
                            <th>
                                <div class="checkbox check-transparent">
                                    <input type="checkbox" value="1" id="allchck">
                                    <label for="allchck"></label>
                                </div>
                            </th>
                            <th class="sortable sort-alpha sort-desc">文章标题</th>
                            <th class="sortable sort-alpha">点击量</th>
                            <th class="sortable sort-alpha">是否置顶</th>
                            <th class="sortable sort-alpha">状态</th>
                            <th class="sortable sort-alpha">作者</th>
                            <th width="150px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox check-transparent">
                                        <input type="checkbox" value="1" id="chck01">
                                        <label for="chck01"></label>
                                    </div>
                                </td>
                                <td>Laravel 十大技巧</td>
                                <td>1000</td>
                                <td><span class="check-toggler checked"></span></td>
                                <td><span class="check-toggler checked"></span></td>
                                <td>Fakeronline</td>
                                <td style=" text-align: center;">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <span class="fa fa-edit"></span> 编辑
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash-o"></span> 删除
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /tile body -->


                <!-- tile footer -->
                <div class="tile-footer bg-transparent-black-2 rounded-bottom-corners">
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-danger btn-sm"><span class="fa fa-trash-o"></span> 删除选中</button>
                        </div>

                        <div class="col-sm-4 text-center">
                            <small class="inline table-options paging-info">当前文章数量：100篇，筛选量15篇/页</small>
                        </div>

                        <div class="col-sm-4 text-right sm-center">
                            <ul class="pagination pagination-xs nomargin pagination-custom">
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /tile footer -->

            </section>
            <!-- /tile -->
        </div>

    </div>
</div>
<!-- /content container -->

@stop
