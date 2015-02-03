var gulp = require('gulp');
var gutil = require('gulp-util');
var autoprefix = require('gulp-autoprefixer');
var coffee = require('gulp-coffee');
var sass = require('gulp-sass');
var phpunit = require('gulp-phpunit');
var notify = require('gulp-notify');
var exec = require('child_process').exec;
var sys = require('sys');

var sassDir = 'app/assets/sass';
var targetCSSDir = 'public/css';
var coffeeDir = 'app/assets/coffee';
var targetJSDir = 'public/js';

gulp.task('css', function() {
	return gulp.src(sassDir + '/main.scss')
		.pipe(sass({ style: 'compressed'}).on('error', gutil.log))
		.pipe(autoprefix('last 10 version'))
		.pipe(gulp.dest(targetCSSDir));
});

gulp.task('js', function() {
    return gulp.src(coffeeDir + '/**/*.coffee')
      .pipe(coffee().on('error', gutil.log))
      .pipe(gulp.dest(targetJSDir));
});

gulp.task('phpunit', function() {
	exec('phpunit', function(error, stdout) {
		sys.puts(stdout);
		});
});

gulp.task('watch', function() {
    gulp.watch(sassDir + '/**/*.scss', ['css']);
    gulp.watch(coffeeDir + '/**/*.coffee', ['js']);
    gulp.watch('app/**/*.php', ['phpunit']);
});

gulp.task('default',['css', 'js', 'phpunit', 'watch']);