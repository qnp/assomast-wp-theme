const gulp = require('gulp');
const stylus = require('gulp-stylus');
const rename = require('gulp-rename');
const browserSync = require('browser-sync').create();

const stylusOptions = {};
gulp.task('stylus', () =>
  gulp
    .src('./stylus/index.styl')
    .pipe(stylus(stylusOptions))
    .pipe(rename('assomast.css'))
    .pipe(gulp.dest('./'))
);

gulp.task('browser-sync', () => {
  browserSync.init({
    proxy: process.env.PROXY,
    files: './assomast.css',
  });
  gulp.watch('./stylus/*.styl', gulp.series('stylus'));
});

gulp.task('default', gulp.series('stylus', 'browser-sync'));
