if(process.env.NODE_ENV === undefined) process.env.NODE_ENV = 'development';
var _development = process.env.NODE_ENV == 'development';

var gulp = require('gulp');
var gutil = require('gutil');
var source = require('vinyl-source-stream');
var browserify = require('browserify');
var sass = require('gulp-sass');

if(_development) {
	var livereload = require('gulp-livereload');
}

var paths = {
	scripts: ['assets/scripts/**/*.js', '!assets/scripts/dist/*'],
	styles: ['assets/styles/**/*.scss', '!assets/styles/dist/*'],
	php: ['../server/site/**/*.php'],
};

gulp.task('scripts', function() {
	var b = browserify();
	b.add('./assets/scripts/index.js');
	
	var stream = b.bundle()
	.pipe(source('index.js'))
	.pipe(gulp.dest('assets/scripts/_dist'));

	if(_development) stream = stream.pipe(livereload());

	return stream;
});

gulp.task('stylesheets', function() {
	var stream = gulp.src('./assets/styles/index.scss')
	.pipe(sass({errLogToConsole: true}))
	.pipe(gulp.dest('assets/styles/_dist'));

	if(_development) stream = stream.pipe(livereload());

	return stream;
});

gulp.task('reload', function() {
	livereload.reload();
});

gulp.task('watch', function() {
	gulp.watch(paths.scripts, ['scripts']);
	gulp.watch(paths.styles, ['stylesheets']);
	gulp.watch(paths.php, ['reload']);
	livereload.listen();
});

gulp.task('default', ['scripts', 'stylesheets']);
gulp.task('develop', ['default', 'watch']);