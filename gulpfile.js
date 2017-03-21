const gulp = require('gulp');
const scss = require('gulp-sass');
const del = require('del');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const cssmin = require('gulp-cssmin');

gulp.task('sass', () => {
  return gulp.src('src/index.scss')
  .pipe(scss())
  .pipe(cssmin())
  .pipe(rename('style.css'))
  .pipe(rename({suffix: '.min'}))
  .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
  }))
  .pipe(gulp.dest('build'))
  .pipe(browserSync.stream());
});

gulp.task('php', () => {
  return gulp.src('src/**/*.php')
    .pipe(gulp.dest('build'));
});

gulp.task('php-watch', ['php'], (done) => {
  browserSync.reload();
  done();
})

gulp.task('clean', () => {
  return del([
    'build/**/*'
  ])
});

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost:8000"
  });
});

gulp.task('image', ['clean'], () => {
  return gulp.src('src/assets/img/*.{png,jpg,jpeg,gif}')
    .pipe(gulp.dest('build/img'));
});

gulp.task('fonts', ['clean'], () => {
  return gulp.src('src/assets/fonts/*.{eot,svg,ttf,woff,woff2,otf}')
    .pipe(gulp.dest('build/fonts'));
});

gulp.task('watch', () => {
  gulp.watch('src/**/*.scss', ['sass']);
  gulp.watch('src/**/*.php', ['php-watch']);
});

gulp.task('default', ['sass', 'php', 'image']);

gulp.task('dev', ['sass', 'php', 'image', 'fonts', 'watch', 'browser-sync']);
