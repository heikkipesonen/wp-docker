const gulp = require('gulp');
const scss = require('gulp-sass');
const del = require('del');
const browserSync = require('browser-sync').create();
const rename = require('gulp-rename');

gulp.task('sass', () => {
  return gulp.src('src/index.scss')
  .pipe(scss())
  .pipe(rename('style.css'))
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

gulp.task('assets-images', ['clean'], () => {
  return gulp.src('src/assets/img/*.{png,jpg,jpeg,gif}')
    .pipe(gulp.dest('build/img'));
});

gulp.task('assets-fonts', ['clean'], () => {
  return gulp.src('src/assets/fonts/*.{eot,svg,ttf,woff,woff2,otf}')
    .pipe(gulp.dest('build/fonts'));
});

gulp.task('watch', () => {
  gulp.watch('src/assets/style/**/*.scss', ['sass']);
  gulp.watch('src/**/*.php', ['php-watch']);
});

gulp.task('default', ['sass', 'php', 'assets-images']);

gulp.task('dev', ['sass', 'php', 'assets-images', 'assets-fonts', 'watch', 'browser-sync']);
