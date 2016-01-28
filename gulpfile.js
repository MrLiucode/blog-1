var elixir = require('laravel-elixir');
var resourcesDir = 'resources/assets';
var publicCssDir = 'public/static/css';
var publicJsDir = 'public/static/js';
elixir(function (mix) {
    mix.copy(resourcesDir + '/js/admin', 'public/static/js/admin'); //移动后台JS文件
    mix.copy(resourcesDir + '/css/admin', 'public/static/css/admin');   //移动后台CSS文件
    mix.copy(resourcesDir + '/images', 'public/static/images');  //移动前后端素材图片
    mix.copy(resourcesDir + '/fonts', 'public/static/fonts');  //移动字体文件
    //首页css
    mix.styles([
        resourcesDir + '/css/components/collection.css',
        resourcesDir + '/css/components/repo-card.css',
        resourcesDir + '/css/components/collection.css',
        resourcesDir + '/css/sections/repo-list.css',
        resourcesDir + '/css/sections/mini-repo-list.css',
        resourcesDir + '/css/components/boxed-group.css',
        resourcesDir + '/css/globals/common.css',
        resourcesDir + '/css/globals/responsive.css',
        resourcesDir + '/css/pages/index.css'
    ], publicCssDir + '/common.css');

    mix.scripts([
        resourcesDir + "/js/common.js",
    ], publicJsDir + '/common.js');

});



