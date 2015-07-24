<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> - @section('title')@show</title>
    <meta name="keywords" content="{$keyword}" />
    <meta name="description" content="{$description}" />
    <meta name="version" content="{$foot['name']}  {$foot.version}" />
    <meta name="author" content="{$author}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="{{_package('bootswatch/cyborg/bootstrap.min.css')}}">
    <style>
        html{min-width: 760px;}
        body{
            font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #888888;
            background-color: #060606;
        }
        img{
            border:0px;
            vertical-align:middle;
        }
        h1,h2,h3,h4,h5,h6{
            font-weight:normal;
        }

        .text-sm{
            height: 30px;
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
        }
        .w300{
            width: 300px;
        }
        .w350{
            width: 350px;
        }
        .w400{
            width: 400px;
        }
        .pdl0{
            padding-left: 0px;
        }
        .pdr0{
            padding-right: 0px;
        }
        .pdlr0{
            padding-left: 0px;
            padding-right: 0px;
        }
        .nav-form{
            margin-left: 100px;
            padding: 3px 0px;;
        }
        .header{margin-top: 70px;}
        .carousel-img{max-width: 640px; max-height: 300px;}
        .carousel{height: 300px;}
        .info{
            overflow:hidden;
            clear:both;
        }
        .well{
            border-radius: 8px;
        }

        .info figure{
            width: 100%;
            height:250px;
            display:block;
            overflow:hidden;
            position:relative;
            -webkit-animation:pageTop 6s ease 0.5s backwards;
            -moz-animation:pageTop 6s ease 0.5s backwards;
            -o-animation:pageTop 6s ease 0.5s backwards;
            -ms-animation:pageTop 6s ease 0.5s backwards;
            animation:pageTop 6s ease 0.5s backwards;
            float:left;
        }

        .info figcaption{
            padding:20px;
            position:absolute;
            top:20%;
            left:0px;
            background-color:rgba(155,155,155,0.7);
            color:#FFF;
            opacity:0;
            -webkit-transition:ease-out opacity 0.75s;
            -moz-transition:opacity 0.75s ease-out;
            -ms-transition:opacity 0.75s ease-out;
            -o-transition:opacity 0.75s ease-out;
        }
        .info figure img{
            max-width: 100%;
            width: 100%;
        }

        .info figure:hover figcaption{
            opacity:1;
        }
        .info figcaption strong{
            display:block;
            line-height:40px;
        }
        a{
            text-decoration:none;
            color:#5D5D5D;
            transition:all ease;
            -webkit-transition:all 1s ease;
            -moz-transition:all 1s ease;
            -o-transition:all 1s ease;
        }
        a:hover{
            color:#FFF;
            text-decoration:none;
        }
        ul,ol{
            text-decoration:none;
            list-style:none;
            padding:0px;
            margin:0px;
        }
        .linkmore{
            padding:15px 0px 0px 15px;
        }
        .linkmore li a {
            height: 50px;
            width: 50px;
            display: block;
            overflow: hidden;
            box-shadow: 0px 1px 0px rgba(255,255,255,.1), inset 0px 1px 1px rgba(0,0,0,.7);
            border-radius: 50%;
            float: left;
            margin: 0 5px;
        }
        .linkmore li a:hover{
            opacity:0.5;
            -webkit-transform:rotate(30deg);
            -moz-transform:rotate(30deg);
            -ms-transform:rotate(30deg);
            -o-transform:rotate(30deg);
        }
        .talk, .address, .email, .photos, .heart{background:url({{_asset('images/icons.png')}}) no-repeat;}
        .talk { background-position: 13px 18px }
        .address{background-position:12px -22px;}
        .email { background-position: 12px -60px }
        .photos { background-position: 12px -137px }
        .heart { background-position: 13px -99px }

        /*博客部分开始*/
        .blogs{

        }
        .bloglist{
            padding: -20px 0px;
            margin:-20px 0px 0px 0px;
        }
        .bloglist>li{
            padding: 5px 0px;
            border-right:solid 2px #999;
            /*margin-bottom: 0px;*/

        }
        .row_box{
            background-color:#222;
            color:#b9b9b9;
            box-shadow:0px 1px 0px rgba(255,255,255,0.1), inset 0px 1px 1px rgba(0,0,0,0.7);
            /*width:630px;*/
            width:94%;
            position:relative;
            border-radius:6px;
        }
        .ti{
            width:0px;
            height:0px;
            border-style:solid;
            border-width:0px 0px 20px 22px;
            border-color:transparent transparent transparent #111;
            position:absolute;
            top:20px;
            right: -22px;
        }
        .ci{
            width:15px;
            height:15px;
            border-radius:50%;
            position:absolute;
            right: -6px;
            margin-top: 30px;
            background-color:#000;
            border:2px solid #333;
        }
        .ci:hover{
            border:#CCC 2px solid;
        }
        .row_box h2.title{
            padding-left:20px;
            font: 16px/50px "微软雅黑", "Microsoft YaHei", Arial, Helvetica, sans-serif;
            color:#353535;
        }
        .row_box h2 a:hover{
            padding-left:20px;
        }
        .textinfo{
            overflow:hidden;
        }
        .row_box img{
            width:150px;
            padding:4px;
            float:left;
            -webkit-transition:all 1s ease;
            -moz-transition:all 1s ease;
            -ms-transition:all 1s ease;
            -o-transition:all 1s ease;
            margin:0px 20px 20px;
        }
        .row_box img:hover{
            opacity:0.6;
        }
        .row_box p{
            line-height:24px;
            padding:0px 20px 20px;
        }
        .row_box p:hover{
            text-shadow:1px 1px 1px #000000;
        }

        .details{
            background-color:rgba(0,0,0,0.3);
            border-radius:0px 0px 6px 6px;
            padding:0px 10px;
        }

        .details li{
            line-height:26px;
            display:inline;
            font-size:11px;
            margin-right:10px;
        }
        .details li a{
            color:#414141;
        }
        .details li a:hover{
            color:#F36;
        }
        .likes, .comments, .icon_time{
            background:url({{_asset('images/icons.png')}}) no-repeat;
        }
        .likes, .comments{
            float:right;
            padding-left:14px;
        }
        .likes{
            background-position:0px -240px;
        }
        .comments{
            background-position:0 -220px;
        }
        .icon_time{
            background-position:0 -208px;
            padding-left:18px;
        }
        /*博客列表部分结束*/

        /*侧边部分开始*/
        .tag{
            padding-top: 5px;
        }
        .tag p{
            line-height:2;
        }
        .tag span{
            margin: 0px 5px;
        }

        .tuijian{
            padding-right: 0px;
        }
        .tuijian li, .clicks li{
            white-space:nowrap;
            text-overflow:ellipsis;
            overflow:hidden;
        }
        .tuijian a:hover{
            padding-left:15px;
        }
        .tuijian li span:before{
            content:"0";
        }
        .tuijian li span{
            margin-right:10px;
            font-size:14px;
            font-family:"微软雅黑";
        }

        .tuijian li:nth-child(-n+3) span{/*从第三个开始倒数，即选择前三个*/
            width:39px;
            color:#999;
        }
        .tuijian li:nth-child(-n+3) strong{
            font-size:24px;
            font-weight:normal;
        }
        .tuijian li:first-child span{/*选择第一个*/
            color:#F30;
        }
        .tuijian li:nth-child(n+3){/*从第三个开始正数，即：第四个开始选择（包括第四个）*/
            line-height:24px;
        }
        .tuijian li:nth-child(4){
            margin-top:5px;
        }
        /*==================================*/
        .toppic img{
            width:80px;
            margin-right:10px;
            float:left;
            -webkit-transition:all 1s ease;
            -moz-transition:all 1s ease;
            -ms-transition:all 1s ease;
            -o-transition:all 1s ease;
        }
        .toppic img:hover{
            opacity:0.6;
        }
        .toppic li:nth-child(2){
            margin:15px 0px;
        }
        .toppic li a{
            display:block;
            width:100%;
            overflow:hidden;
            clear:both;
        }
        .toppic li p{
            padding-left:100px;
            margin-top:5px;
            color:#F63;
        }
        /*===========================*/
        .clicks li{
            line-height:24px;
        }
        .clicks li span:before{
            content:"【";
        }
        .clicks li span:after{
            content:"】";
        }
        .clicks li span a{
            padding:0px 5px;
            color:#F63;
        }
        .clicks li a:hover{
            text-decoration:underline;
        }

        /*侧边部分结束*/

        /*底部部分开始*/
        .footer{
            background-color:rgba(0,0,0,0.4);
            box-shadow:0px 1px 0px rgba(255,255,255,0.1), insert 0px 1px 1px rgba(0,0,0,0.55);
            border-top:2px solid #2A2A2A;
        }
        .footer .mid{
            padding:20px 0px;
            overflow:hidden;
            text-align: center;
        }
        /*底部部分结束*/

        .page-div{
            margin: 10px;
        }


    </style>
    @section('meta')
    @show
    @section('headLink')
    @show
</head>
<body>
@include('default.widgets.header')
@section('main')
@show
@include('default.widgets.footer')
</body>
<script src="{{_package('jquery/dist/jquery.min.js')}}"></script>
<script src="{{_package('bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{_package('bootstrap/js/carousel.js')}}" ></script>
</html>
