// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass = require( 'gulp-sass' );
var imagemin = require( 'gulp-imagemin' );
var pngquant = require( 'imagemin-pngquant' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var rename = require( 'gulp-rename' );
var sourcemaps = require( 'gulp-sourcemaps' );
var filter = require( 'gulp-filter' );

gulp.task(images);
gulp.task(styles);
gulp.task(scripts);

// images Task
function images() {
	return gulp.src( ['images/**/*.jpg', 'images/**/*.png', 'images/**/*.gif', '!images/min/**/*'] )
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe( gulp.dest( './images/min' ) );
}

// Compile styles
function styles() {
	return gulp.src('scss/**/*.scss')
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( sass.sync({ outputStyle : 'compressed' }).on('error', sass.logError) )
		.pipe( sourcemaps.write( '../css' ) )
		.pipe(gulp.dest('css'));
}

// Concatenate & Minify JS
function scripts() {
	return gulp.src( [ 'js/custom/*.js', 'js/vendor/*.js' ])
		.pipe( concat('theme.js') )
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( rename('theme.min.js') )
		.pipe( uglify() )
		.pipe( sourcemaps.write( '../js' ) )
		.pipe( gulp.dest('js') );
}

gulp.task( 'watch:scripts', function() {
	gulp.watch( ['js/custom/**/*.js', 'js/vendor/**/*.js'], scripts);
});

gulp.task( 'watch:sass', function() {
	gulp.watch( ['scss/**/*.scss'], styles);
});

gulp.task( 'watch:images', function() {
	gulp.watch( ['images/**/*', '!images/min/**/*'], images);
});

gulp.task('watch', gulp.parallel('watch:scripts', 'watch:sass', 'watch:images'));

// Default Task
gulp.task( 'default', gulp.series('images', 'styles', 'scripts', 'watch'));