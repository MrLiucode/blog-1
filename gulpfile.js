/**
 * 组件安装
 * npm install gulp-util gulp-imagemin gulp-ruby-sass gulp-minify-css gulp-jshint gulp-uglify gulp-rename gulp-concat gulp-clean gulp-livereload tiny-lr --save-dev
 */

// 引入 gulp及组件
var gulp    = require('gulp'),                 //基础库
    imagemin = require('gulp-imagemin'),       //图片压缩
    sass = require('gulp-ruby-sass'),          //sass
    minifycss = require('gulp-minify-css'),    //css压缩
    jshint = require('gulp-jshint'),           //js检查
    uglify  = require('gulp-uglify'),          //js压缩
    rename = require('gulp-rename'),           //重命名
    concat  = require('gulp-concat'),          //合并文件
    clean = require('gulp-clean'),             //清空文件夹
    tinylr = require('tiny-lr'),               //livereload
    server = tinylr(),
    port = 35729,
    livereload = require('gulp-livereload');   //livereload

// 样式处理
gulp.task('css', function () {
    var cssSrc = './resources/assets/css/*.css',
        cssDst = './public/default/css';

    gulp.src(cssSrc)
        .pipe(gulp.dest(cssDst))
        .pipe(minifycss())
        .pipe(livereload(server))
        .pipe(gulp.dest(cssDst));
});

//前台js处理
gulp.task('js', function () {
    var jsSrc = './resources/assets/js/*.js',
        jsDst ='./public/default/js';

    gulp.src(jsSrc)
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('default'))
        .pipe(uglify())
        .pipe(livereload(server))
        .pipe(gulp.dest(jsDst));
});

//后台js处理
gulp.task('adminJs', function () {
    var jsSrc = './resources/assets/js/admin/*.js',
        jsDst ='./public/admin/js';

    gulp.src(jsSrc)
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('default'))
        .pipe(uglify())
        .pipe(livereload(server))
        .pipe(gulp.dest(jsDst));
});

gulp.task('img', function(){

    var imgSrc = './resources/assets/images/*';
    var imgDst = './public/default/images';

    gulp.src(imgSrc).pipe(gulp.dest(imgDst));

});

// 清空图片、样式、js
gulp.task('clean', function() {
    gulp.src(['./public/default/css/*', './public/default/js/*', './public/default/images/*', './public/admin/js/*'], {read: false})
        .pipe(clean());
});

// 默认任务 清空图片、样式、js并重建 运行语句 gulp
gulp.task('default', ['clean'], function(){
    gulp.start('css');
    gulp.start('js');
    gulp.start('img');
    gulp.start('adminJs');
});

// 监听任务 运行语句 gulp watch
gulp.task('watch',function(){

    server.listen(port, function(err){
        if (err) {
            return console.log(err);
        }

        // 监听css
        gulp.watch('resources/assets/css/*.css', function(){
            gulp.start('css');
        });

        // 监听js
        gulp.watch('resources/assets/js/*.js', function(){
            gulp.start('js');
        });

        gulp.watch('resources/assets/js/admin/*.js', function(){
            gulp.start('adminJs');
        });

        gulp.watch('resources/assets/images/*.*', function(){
            gulp.start('img');
        });

    });
});