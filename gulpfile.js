var elixir = require('laravel-elixir');
elixir(function(mix) {
    mix.copy('resources/assets/package', 'public/static/package');
});

//var gulp = require('gulp'),
//    minifycss = require('gulp-minify-css'),
//    concat = require('gulp-concat'),
//    rename = require('gulp-rename'),
//    uglify = require('gulp-uglify'),
//    plumber = require('gulp-plumber'),
//    clean = require('gulp-clean');
//
//var adminJsDir = 'public/static/js/admin/';
//var adminCssDir = 'public/static/css/admin/';
//var adminPackageJsDir = 'public/static/package/js';
//var adminPackageCssDir = 'public/static/package/css';
//var resourceDir = 'resources/assets';
//var packageDir = resourceDir + '/package/';
//var imagesDir = 'public/static/images';
//
//var packageCss = [
//    packageDir + '/jquery-ui/themes/base/jquery-ui.min.css',
//    packageDir + '/bootstrap/dist/css/bootstrap.min.css',
//    packageDir + '/bootstrap/dist/css/bootstrap.min.css.map',
//    packageDir + '/font-awesome/css/font-awesome.min.css',
//    packageDir + '/font-awesome/css/font-awesome.min.css.map',
//    packageDir + '/icheck/skins/flat/blue.css',
//    packageDir + '/icheck/skins/flat/blue.png',
//    packageDir + '/icheck/skins/flat/blue@2x.png'
//];
//
//var packageJs = [
//    packageDir + '/pace/pace.min.js',
//    packageDir + '/jquery/dist/jquery.min.js',
//    packageDir + '/jquery/dist/jquery.min.map',
//    packageDir + '/icheck/icheck.min.js',
//    packageDir + '/jquery.slimscroll/jquery.slimscroll.min.js',
//    packageDir + '/jquery-migrate/jquery-migrate.min.js',
//    packageDir + ''
//];
//
////移动图片
//gulp.task('images', function (cb) {
//    return gulp.src([resourceDir + '/images/**/*']).pipe(plumber()).pipe(gulp.dest(imagesDir));
//});
//
////后台CSS
//gulp.task('admin-css', function (cb) {
//    gulp.src([adminCssDir], {read: false}).pipe(plumber()).pipe(clean());
//    return gulp.src(resourceDir + '/css/admin/*.css')
//        .pipe(plumber())
//        .pipe(minifycss())
//        .pipe(gulp.dest(adminCssDir));
//});
//
////后台JS
//gulp.task('admin-js', function (cb) {
//    gulp.src([adminJsDir], {read: false}).pipe(plumber()).pipe(clean());
//    return gulp.src(resourceDir + '/js/admin/*.js')
//        .pipe(plumber())
//        .pipe(uglify())
//        .pipe(gulp.dest(adminJsDir));
//});
//
////扩展包CSS
//gulp.task('package-css', function (cb) {
//    gulp.src([adminPackageCssDir], {read: false}).pipe(plumber()).pipe(clean());
//    return gulp.src(packageCss)
//        .pipe(plumber())
//        .pipe(minifycss())
//        .pipe(gulp.dest(adminPackageCssDir));
//
//});
//
////后台JS
//gulp.task('package-js', function (cb) {
//    gulp.src([adminPackageJsDir], {read: false}).pipe(plumber()).pipe(clean());
//    return gulp.src(packageJs)
//        .pipe(plumber())
//        .pipe(uglify())
//        .pipe(gulp.dest(adminPackageJsDir));
//});
//
////默认指令
//gulp.task('default', function () {
//    gulp.start('images', 'admin-css', 'admin-js', 'package-css', 'package-js');
//});
//
////监听文件变化
//gulp.task('watch', function () {
//    gulp.start('default');
//});



