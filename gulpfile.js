var elixir = require('laravel-elixir');
var resourcesDir = 'resources/assets';
var publicCssDir = 'public/static/css';
var publicJsDir = 'public/static/js';
elixir(function (mix) {
    mix.copy(resourcesDir + '/package', 'public/static/package');   //移动包文件
    mix.copy(resourcesDir + '/js/admin', 'public/static/js/admin'); //移动后台JS文件
    mix.copy(resourcesDir + '/css/admin', 'public/static/css/admin');   //移动后台CSS文件
    mix.copy(resourcesDir + '/images', 'public/static/images');  //移动前后端素材图片

    //首页css
    mix.styles([
        resourcesDir + '/css/site.min.css', resourcesDir + '/css/common.css'
    ], publicCssDir + '/common.css');

    mix.scripts([
        resourcesDir + "/js/common.js",
    ], publicJsDir + '/common.js');

});



