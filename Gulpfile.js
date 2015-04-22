if(process.env.NODE_ENV === undefined) process.env.NODE_ENV = 'development';

var gulp = require('gulp'),
	exec = require('child_process').exec;


gulp.task('frontend', function() {
	var devString = process.env.NODE_ENV == 'development' ? 'develop' : '';
	exec('cd public && gulp ' + devString, function(err, stdout, stderr) {
		if(err) {
			console.log('[gulp] [gulp] ', stderr, err);
		} else {
			console.log('[gulp] [gulp] ', stdout);
		}
	});
});

// === START TASKS

gulp.task('default', ['frontend']);
gulp.task('develop', ['frontend']);