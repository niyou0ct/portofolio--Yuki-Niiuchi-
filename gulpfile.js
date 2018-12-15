var gulp = require('gulp');
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var uglify = require("gulp-uglify");
var browser = require("browser-sync");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var concat = require('gulp-concat');
var header = require('gulp-header');
var babel = require("gulp-babel");
var runSequence = require('run-sequence');
var connect = require('gulp-connect-php');


//sassコンパイル
gulp.task("sass", function() {
    gulp.src("./app/scss/*.scss")
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
         }))
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ["last 2 versions", "ie >= 9", "Android >= 4","ios_saf >= 8"],
            cascade: false
         }))
        .pipe(cssmin())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest("./css/min"))
        .pipe(browser.reload({stream:true}))
});

//phpファイル出力
gulp.task("php", function() {
    gulp.src("./app/**/*.php")
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
         }))
        .pipe(gulp.dest("./"))
});

gulp.task('babel', function() {
  return gulp.src('./app/js/*.js')
    .pipe(plumber())
    .pipe(babel({presets: ['@babel/env']}))
    .pipe(uglify({output: {comments: /^!/}}))
    .pipe(rename({extname: '.min.js'}))
    .pipe(gulp.dest('./js/min'));
});

gulp.task('js.vendor', function() {
  return gulp.src('./app/js/vendor/**/*.js')
    .pipe(plumber())
    .pipe(gulp.dest('./js/vendor/'));
});

//その他ファイル出力
gulp.task("assets", function() {
    gulp.src('./app/assets/**')
    .pipe(plumber({
        errorHandler: notify.onError("Error: <%= error.message %>")
     }))
    .pipe(gulp.dest("assets"))
});


gulp.task('js.concat', function() {
  return gulp.src('./app/js/*.js')
    .pipe(plumber())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./js/min'));
});
gulp.task('js.uglify', ['js.concat'], function() {
  return gulp.src('js/min/main.js')
    .pipe(plumber())
    .pipe(uglify({
      // ※ gulp-uglify v3.0.0 以上↓
      output:{
        comments: /^!/   // 正規表現で /*! //! で始まるコメントを残す
      }
    }))
    .pipe(rename('main.min.js'))  // 出力するファイル名を変更
    .pipe(gulp.dest('./js/min'));
});


//gulpコマンド入力時にローカルサーバーを立ち上げる処理
// gulp.task('server', function() {
//   connect.server({
//     port:8888,
//     base:'./'
//   }, function (){
//     browser({
//       proxy: 'localhost:8888'
//     });
//   });
// });

gulp.task('server', function() {
  browser.init({
    port: 8889,
    server: {
      baseDir: './'
    }
  });
});

gulp.task('browser-reload', function(){
  browser.reload();
});

// watch
gulp.task('watch', function(){
  gulp.watch('./app/**/*.php', ['browser-reload']);
  gulp.watch('./app/**/*.php', ['php']);
  gulp.watch("./app/scss/**/*.scss",["sass"]);
  gulp.watch('./app/js/*.js', ['babel']);
  gulp.watch('./app/js/vendor/**/*.js', ['js.vendor']);
  gulp.watch('./app/assets/**', ['assets']);
});


// commonタスクをまとめる
gulp.task('common', ['sass', 'php', 'babel', 'js.vendor', 'assets', 'watch', 'server']);

// serverなしのタスクをまとめる
gulp.task('run', ['sass', 'php', 'babel', 'js.vendor', 'assets', 'watch']);

// 監視して処理するのをひとまとめにしておく。
gulp.task('js', ['js.concat', 'js.uglify']);

//defaultにタスクを追加
gulp.task("default",['js','server']);
