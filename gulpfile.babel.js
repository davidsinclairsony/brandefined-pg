import gulp from 'gulp';
import gutil from 'gulp-util';
import sass from 'gulp-sass';
import runSequence from 'run-sequence';
import browserSync from 'browser-sync';
import autoprefixer from 'autoprefixer';
import postcss from 'gulp-postcss';

const themePath = './wp-content/themes/brandefined-divi/';
const sassPaths = {
  blob: `${themePath}**/*.scss`,
  source: `${themePath}style.scss`
};
let bs = browserSync.create()

gulp.task(
  'sass:compile',
  () => gulp.src(sassPaths.source)
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(postcss([autoprefixer({browsers: ['last 2 versions'] })]))
    .pipe(gulp.dest(themePath))
    .pipe(bs.stream())
);

gulp.task('sass:watch', () => {gulp.watch(sassPaths.blob, ['sass:compile']);});

gulp.task(
  'browserSync',
  () => {
    bs.init({
      proxy: 'http://localhost:8080',
      open: false
    });
  }
);

gulp.task('default', done => {
  runSequence('sass:compile', 'sass:watch', 'browserSync', done);
});
