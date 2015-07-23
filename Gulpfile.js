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
	scripts: ['public/assets/scripts/**/*.js', '!public/assets/scripts/_dist/*'],
	styles: ['public/assets/styles/**/*.scss', '!public/assets/styles/_dist/*'],
	php: ['server/site/**/*.php'],
	content: ['public/content/**/*'],
};

gulp.task('scripts', function() {
	return browserify('./public/assets/scripts/index.js')
	.transform(stringify(['.html']))
	.bundle()
	.pipe(source('index.js'))
	.pipe(buffer())
	//.pipe(uglify())
	.pipe(gulp.dest('public/assets/scripts/_dist'))
	.pipe(livereload());
});

gulp.task('stylesheets', function() {
	return gulp.src('./public/assets/styles/index.scss')
	.pipe(sass({errLogToConsole: true}))
	.pipe(autoprefixer('last 2 versions'))
	.pipe(css())
	.pipe(gulp.dest('public/assets/styles/_dist'))
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