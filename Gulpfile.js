var gulp = require('gulp');
var gutil = require('gutil');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var browserify = require('browserify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var css = require('gulp-uglifycss');
var livereload = require('gulp-livereload');
var stringify = require('stringify');

var paths = {
	scripts: ['assets/scripts/**/*.js', '!assets/scripts/_dist/*'],
	styles: ['assets/styles/**/*.scss', '!assets/styles/_dist/*'],
	php: ['server/site/**/*.php'],
	content: ['content/**/*'],
};

gulp.task('scripts', function() {
	return browserify('./assets/scripts/index.js')
	.transform(stringify(['.html']))
	.bundle()
	.pipe(source('index.js'))
	.pipe(buffer())
	.pipe(uglify())
	.pipe(gulp.dest('assets/scripts/_dist'))
	.pipe(livereload());
});

gulp.task('stylesheets', function() {
	return gulp.src('./assets/styles/index.scss')
	.pipe(sass({errLogToConsole: true}))
	.pipe(autoprefixer('last 2 versions'))
	.pipe(css())
	.pipe(gulp.dest('assets/styles/_dist'))
	.pipe(livereload());
});

gulp.task('reload', function() {
	livereload.reload();
});

gulp.task('watch', function() {
	gulp.watch(paths.scripts, ['scripts']);
	gulp.watch(paths.styles, ['stylesheets']);
	gulp.watch(paths.php, ['reload']);
	gulp.watch(paths.content, ['reload']);
	livereload.listen();
});

gulp.task('compile', ['scripts', 'stylesheets']);
gulp.task('default', ['compile', 'watch']);