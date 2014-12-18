/* jshint node:true */
'use strict';
var SRC_DIR = 'src';
var BUILD_DIR = 'builds';
var OUTPUT_DIR = 'dist';
var BUILD_SITE_NAME = 'html-site';

var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber    = require('gulp-plumber');
var $ = require('gulp-load-plugins')();
var tar = require('gulp-tar');
var gzip = require('gulp-gzip');
var sequence = require('run-sequence');
var fileinclude = require('gulp-file-include');

var onError = function(err) {
  console.log(err);
};

gulp.task('copyfiles',['copyvendors'], function(){
  gulp.src(SRC_DIR+'/assets/videos/**/*.*')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/videos/'));
});
gulp.task('package', function(callback){
  sequence(
    'clean',
    'build',
    'copybuild',
    'make-build',
    'clean',
    callback
  );
});
gulp.task('copybuild', function(){
  return gulp.src(OUTPUT_DIR+'/**/*.*')
  .pipe(
    gulp.dest('.tmp/'+BUILD_SITE_NAME+'/')
  );
});

gulp.task('make-build', function(){
  return gulp.src('.tmp/**/*.*').pipe(tar('build.tar'))
  .pipe(gzip())
  .pipe(gulp.dest(BUILD_DIR))
  .pipe($.notify({ message: 'Build Packaged' }));
});

gulp.task('copyfiles',['copyvendors'], function(){
  gulp.src(SRC_DIR+'/assets/videos/**/*.*')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/videos/'));
});

gulp.task('copyvendors', function(){
  //Copy Vendor assets to dist directory
  gulp.src(SRC_DIR+'/assets/chart/**/*.*')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/chart/'));
});

gulp.task('copycss',['copyfiles'], function() {
  gulp.src(SRC_DIR+'/assets/css/bootstrap.css')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/css/'));
  gulp.src(SRC_DIR+'/assets/css/font-awesome.min.css')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/css/'));
});

gulp.task('styles', function () {
  return gulp.src(SRC_DIR+'/assets/css/main.scss')
    .pipe(sass())
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/css/'));
});

gulp.task('jshint', function() {
  return gulp.src(SRC_DIR+'/assets/js/*.js')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe($.jshint.reporter('fail'));
});

gulp.task('scripts', function() {
  return gulp.src(SRC_DIR+'/assets/js/**/*.js')
      .pipe(gulp.dest(OUTPUT_DIR+'/assets/js'));

});

gulp.task('html', ['styles','copyfiles'], function () {
  var assets = $.useref.assets({searchPath: '{.tmp,src}'});
  return gulp.src([SRC_DIR+'/*.html', SRC_DIR+'/**/*.php'])
    .pipe(assets)
    .pipe(assets.restore())
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file'
    }))
    .pipe(gulp.dest(OUTPUT_DIR));
});

gulp.task('images', function () {
  return gulp.src(SRC_DIR+'/assets/img/**/*')
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/img'));
});

gulp.task('fonts', function () {
  return gulp.src(SRC_DIR+'/assets/fonts/**/*')
    .pipe($.filter('**/*.{eot,svg,ttf,woff}'))
    .pipe(gulp.dest(OUTPUT_DIR+'/assets/fonts'));
});

gulp.task('clean', require('del').bind(null, ['.tmp', OUTPUT_DIR]));

gulp.task('connect', ['styles'], function () {
  var serveStatic = require('serve-static');
  var serveIndex = require('serve-index');
  var app = require('connect')()
    .use(require('connect-livereload')({port: 35729}))
    .use(serveStatic('.tmp'))
    .use(serveStatic(OUTPUT_DIR))
    .use(serveIndex(OUTPUT_DIR));
  require('http').createServer(app)
  .listen(9000)
  .on('listening', function () {
    console.log('Started connect web server on http://localhost:9000');
  });
});

gulp.task('serve', ['connect', 'watch'], function () {
  require('opn')('http://localhost:9000');
});

gulp.task('watch',['build','connect'], function() {
  gulp.watch(SRC_DIR+'/assets/css/**/*.scss', ['styles']);
  gulp.watch(SRC_DIR+'/assets/js/*.js', ['jshint', 'scripts']);
  gulp.watch(SRC_DIR+'/assets/img/**/*', ['images']);
  gulp.watch(SRC_DIR+'/assets/chart/**/*.*', ['copyvendors']);
  gulp.watch(SRC_DIR+'/**/*.*', ['html']);
  var server = $.livereload();
  gulp.watch([SRC_DIR+'/**']).on('change', server.changed);
  $.livereload.listen();
});

gulp.task('build',
  ['jshint','scripts', 'html', 'images', 'fonts','styles','copycss'], function () {
  return gulp.src(OUTPUT_DIR+'/**/*').pipe($.size({title: 'build'}));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
