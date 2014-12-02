/* jshint node:true */
'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber    = require('gulp-plumber');
var $ = require('gulp-load-plugins')();

var onError = function(err) {
  console.log(err);
};

gulp.task('copycss', function() {
  gulp.src('src/assets/css/bootstrap.css').pipe(gulp.dest('dist/assets/css/'));
  gulp.src('src/assets/css/font-awesome.min.css').pipe(gulp.dest('dist/assets/css/'));
});

gulp.task('styles', function () {
  return gulp.src('src/assets/css/main.scss')
    .pipe(sass())
    .pipe(gulp.dest('src/assets/css/'))
    .pipe(gulp.dest('dist/assets/css/'));
});


gulp.task('jshint', function() {
  return gulp.src('src/assets/js/*.js')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe($.jshint.reporter('fail'))
    .pipe($.notify({ message: 'JS Hinting task complete' }));
});

gulp.task('scripts', function() {
  return gulp.src('src/assets/js/**/*.js')
      .pipe(gulp.dest('dist/assets/js'))
      .pipe($.notify({ message: 'Scripts task complete' }));
});

gulp.task('html', ['styles','copycss'], function () {
  var assets = $.useref.assets({searchPath: '{.tmp,src}'});
  return gulp.src('src/*.html')
    .pipe(assets)
    .pipe(assets.restore())
    .pipe(gulp.dest('dist'));
});

gulp.task('images', function () {
  return gulp.src('src/assets/img/**/*')
    .pipe(gulp.dest('dist/assets/img'));
});

gulp.task('fonts', function () {
  return gulp.src('src/assets/fonts/**/*')
    .pipe($.filter('**/*.{eot,svg,ttf,woff}'))
    .pipe(gulp.dest('dist/assets/fonts'));
});

gulp.task('clean', require('del').bind(null, ['.tmp', 'dist']));

gulp.task('connect', ['styles'], function () {
  var serveStatic = require('serve-static');
  var serveIndex = require('serve-index');
  var app = require('connect')()
    .use(require('connect-livereload')({port: 35729}))
    .use(serveStatic('.tmp'))
    .use(serveStatic('dist'))
    .use(serveIndex('dist'));
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
  gulp.watch('src/assets/css/**/*.scss', ['styles']);
  gulp.watch('src/assets/js/*.js', ['jshint', 'scripts']);
  gulp.watch('src/assets/img/**/*', ['images']);
  var server = $.livereload();
  gulp.watch(['src/**']).on('change', server.changed);
  $.livereload.listen();
});

gulp.task('build',
      ['jshint','scripts', 'html', 'images', 'fonts','styles','copycss'], function () {
  return gulp.src('dist/**/*').pipe($.size({title: 'build'}));
});

gulp.task('default', ['clean'], function () {
  gulp.start('build');
});
