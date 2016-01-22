var elixir = require('laravel-elixir');
var resourcesDir = 'resources/assets';
var publicCssDir = 'public/static/css';
elixir(function (mix) {
    mix.copy(resourcesDir + '/package', 'public/static/package');
    mix.copy(resourcesDir + '/js/admin', 'public/static/js/admin');
    mix.copy(resourcesDir + '/css/admin', 'public/static/css/admin');

    //首页css
    mix.styles([
        resourcesDir + '/css/site.css', resourcesDir + '/css/common.css'
    ], publicCssDir + '/common.css');

});



