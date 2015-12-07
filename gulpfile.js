var elixir = require('laravel-elixir');
var gulp = require('gulp'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    clean = require('gulp-clean');

var adminJsDir = 'public/static/admin/js/';
var adminCssDir = 'public/static/admin/css/';
var adminPackageJsDir = 'public/static/package/js';
var adminPackageCssDir = 'public/static/package/css';
var resourceDir = 'resources/assets';
var packageDir = resourceDir + '/package/';

var packageCss = [
    packageDir + '/jquery-ui/themes/base/jquery-ui.min.css',
    packageDir + '/bootstrap/dist/css/bootstrap.min.css',
    packageDir + '/bootstrap/dist/css/bootstrap.min.css.map',
    packageDir + 'font-awesome/css/font-awesome.min.css',
    packageDir + 'font-awesome/css/font-awesome.min.css.map'
];

var packageJs = [];

//后台CSS
gulp.task('admin-css', function (cb) {
    gulp.src([adminCssDir], {read:false}).pipe(plumber()).pipe(clean());
    return gulp.src(resourceDir + '/css/admin/*.css')
        .pipe(minifycss())
        .pipe(gulp.dest(adminCssDir));
});

//后台JS
gulp.task('admin-js', function (cb) {
    gulp.src([adminJsDir], {read:false}).pipe(plumber()).pipe(clean());
    return gulp.src(resourceDir + '/js/admin/*.js')
        .pipe(uglify())
        .pipe(gulp.dest(adminJsDir));
});

//扩展包CSS
gulp.task('package-css', function (cb) {
    gulp.src([adminPackageCssDir], {read:false}).pipe(plumber()).pipe(clean());
    return gulp.src(packageCss)
        .pipe(minifycss())
        .pipe(gulp.dest(adminPackageCssDir));

});

//后台JS
gulp.task('package-js', function (cb) {
    gulp.src([adminPackageJsDir], {read:false}).pipe(plumber()).pipe(clean());
    return gulp.src(packageJs)
        .pipe(uglify())
        .pipe(gulp.dest(adminPackageJsDir));
});

//默认指令
gulp.task('default', function () {
    gulp.start('admin-css', 'admin-js', 'package-css', 'package-js');
});

//监听文件变化
gulp.task('watch', function () {
    gulp.start('default');
});



