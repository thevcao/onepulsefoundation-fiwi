'use strict';

// Node/Gulp plugins
const gulp    = require('gulp');
const merge   = require('merge-stream');
const plugins = require('gulp-load-plugins')({ camelize: true });
const through = require('through2');

// CSS task
gulp.task('styles', () => {
  return gulp.src('src/scss/main.scss')
    .pipe(plugins.plumber())
    .pipe(plugins.sass({ outputStyle: 'compressed' }))
    .pipe(plugins.postcss([
      require('autoprefixer')({ browsers: ['last 2 versions'] })
    ]))
    .pipe(plugins.rename('styles.min.css'))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/css'))
    .pipe(plugins.size({ title: 'styles' }));
});

gulp.task('modernizr', () => {
  return gulp.src('src/js/**/*.js')
    .pipe(plugins.modernizr())
    .pipe(plugins.concat('modernizr.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest("dist/js/vendor/"))
});

// Fonts
gulp.task('fonts', () => {
  return gulp.src('src/fonts/**/*')
  .pipe(gulp.dest('dist/fonts'))
})

// Scripts task
gulp.task('scripts', () => {
  return gulp.src([
      'src/js/**/*.js',
      '!src/js/vendor/*.js'
    ])
    .pipe(plugins.plumber())
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.babel())
    .pipe(plugins.concat('scripts.min.js'))
    .pipe(plugins.uglify())
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/js'))
    .pipe(plugins.size({ title: 'scripts' }));
})

// Optimizes images
gulp.task('images', () => {
  return gulp.src('src/img/**/*')
    .pipe(plugins.plumber())
    .pipe(plugins.imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [require('imagemin-pngquant')()]
    }))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/img'))
    .pipe(plugins.size({ title: 'images' }));
});

// Build task
gulp.task('build', ['styles', 'scripts', 'modernizr', 'images', 'fonts']);

// Watch task
gulp.task('watch', () => {
  gulp.watch(['src/img/**/*'], ['images']);
  gulp.watch(['src/fonts/**/*'], ['fonts']);
  gulp.watch(['src/scss/**/*.scss'], ['styles']);
  gulp.watch(['src/js/**/*.js'], ['scripts']);
});



//var uncss = require('gulp-uncss');
//var rename = require('gulp-rename');
//
//gulp.task('uncss', function () {
//
//    gulp.src('dist/css/styles.min.css')
//        .pipe(uncss({
//    	ignore: [],
//        html: []
//        })).pipe(rename({
//            suffix: '.clean'
//        }))
//
//    .pipe(gulp.dest('dist/css/'));
//
//});

// Default task w UNCSS
//gulp.task('default', ['build', 'watch', 'uncss']);

// Default task
gulp.task('default', ['build', 'watch']);