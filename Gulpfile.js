'use strict';

// Node/Gulp plugins
const gulp    = require('gulp');
const merge   = require('merge-stream');
const plugins = require('gulp-load-plugins')({ camelize: true });
const through = require('through2');
const sassGlob = require('gulp-sass-glob');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const sourcemaps = require('gulp-sourcemaps');

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    '*.php',
    './partials/*.php',
    './partials/*/*.php',
    './templates/*.php',
    '/wp-json'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "http://onepulsefoundation.onpu.dev",
    notify: false
    });
});


// CSS task
gulp.task('styles', () => {
  return gulp.src('src/scss/main.scss')
	.pipe(sassGlob())
	.pipe(sourcemaps.init())
	.pipe(plugins.plumber())
    .pipe(plugins.sass({ outputStyle: 'compressed' }))
    .pipe(plugins.postcss([
      require('autoprefixer')({ browsers: ['last 2 versions'] })
    ]))
    .pipe(plugins.rename('styles.min.css'))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(plugins.plumber.stop())
    .pipe(gulp.dest('dist/css'))
	.pipe(browserSync.stream())
    .pipe(plugins.size({ title: 'styles' }));
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


gulp.task('modernizr', () => {
  return gulp.src([
	  'dist/js/*.js',
	  'dist/css/*.css'
  ])
    .pipe(plugins.modernizr())
    .pipe(plugins.concat('modernizr.min.js'))
    .pipe(plugins.uglify())
    .pipe(gulp.dest("dist/js/vendor/"))
});

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


// Default task
gulp.task('default', ['build', 'browser-sync', 'watch']);