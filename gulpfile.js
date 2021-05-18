var gulp = require('gulp');
var concat = require('gulp-concat');
var bower = require('bower');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var strip = require('gulp-strip-comments');

var vendor = {
    css: [
        'vendor/bower_components/jquery-ui/themes/base/jquery-ui.min.css',
        'vendor/bower_components/font-awesome/css/font-awesome.min.css'
    ],

    bootstrap: [
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'vendor/bower_components/jquery-ui/jquery-ui.min.js'
    ]
};

var src = {
    js: [
        'app/Resources/assets/js/src/Namespace.js',
        'app/Resources/assets/js/src/!(Namespace|Bootstrap)*.js',
        'app/Resources/assets/js/src/Bootstrap.js'
    ]
};

var dist = {
    fonts: 'public/assets/fonts/',
    css: 'public/assets/css/',
    js: 'public/assets/js/',
    img: 'public/assets/img/'
};

gulp.task('bower', function () {
    return bower();
});

gulp.task('vendor', function (done) {
    gulp.src(vendor.bootstrap)
        .pipe(concat('bootstrap.min.js'))
        .pipe(gulp.dest(dist.js))
    ;

    gulp.src(vendor.css)
        .pipe(concat('vendor.min.css'))
        .pipe(gulp.dest(dist.css))
    ;

    gulp.src('vendor/bower_components/font-awesome/fonts/*')
        .pipe(gulp.dest(dist.fonts));

    done();
});

gulp.task('js', function (done) {
    gulp.src(src.js)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dist.js))
    ;

    done();
});

gulp.task('css', function (done) {
    gulp.src('app/Resources/assets/sass/*.sass')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest(dist.css));

    done();
});