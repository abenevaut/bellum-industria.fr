'use strict';

var fs = require('fs');
var path = require('path');
var gulp = require('gulp');
var less = require('gulp-less');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var minifycss = require('gulp-minify-css');
var bower = require('gulp-bower');
var rev = require('gulp-rev');
var rename = require("gulp-rename");

//CONFIG PATHS
var config = {
    clip: './resources/assets/clip/clip-2',
    cvepdb: './resources/assets/cvepdb',
    longwave: './resources/assets/longwave',
    pages: './resources/assets/pages/html',
    build: './public/assets'
};

/**
 * SASS STUFF
 */

gulp.task('sass', ['cvepdb-longwave-layouts-sass', 'cvepdb-pages-layouts-sass'], function () {
});

gulp.task('cvepdb-longwave-layouts-sass', function () {
    gulp.src(config.cvepdb + '/longwave/layouts/multigaming/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(minifycss())
        .pipe(rev())
        .pipe(gulp.dest(config.cvepdb + '/css/multigaming'))
        .pipe(rev.manifest())
        .pipe(rename('css.manifest.json'))
        .pipe(gulp.dest('app/assets/rev/multigaming'));
    gulp.src(config.cvepdb + '/longwave/layouts/vitrine/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(minifycss())
        .pipe(rev())
        .pipe(gulp.dest(config.cvepdb + '/css/vitrine'))
        .pipe(rev.manifest())
        .pipe(rename('css.manifest.json'))
        .pipe(gulp.dest('app/assets/rev/vitrine'));
});

gulp.task('cvepdb-pages-layouts-sass', function () {
    gulp.src(config.cvepdb + '/pages/layouts/admin/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(minifycss())
        .pipe(rev())
        .pipe(gulp.dest(config.cvepdb + '/css/admin/'))
        .pipe(rev.manifest())
        .pipe(rename('css.manifest.json'))
        .pipe(gulp.dest('app/assets/rev/admin'));
});

/**
 * BOWER STUFF
 */

gulp.task('bower', ['cvepdb-cvepdbjs-bower', 'longwave-bower'], function () {
});

gulp.task('cvepdb-cvepdbjs-bower', function () {
    return bower({directory: './libs', cwd: config.cvepdb + '/cvepdbjs'});
});

gulp.task('longwave-bower', function () {
    return bower({directory: './libs', cwd: config.longwave + '/js'});
});

/**
 * S3 STUFF
 */

var s3 = require("gulp-s3-util");
var gzip = require("gulp-gzip");

gulp.task("s3-upload", function () {

    var s3_config = JSON.parse(fs.readFileSync('./awsaccess.json'));

    var options = {
        gzippedOnly: true,
        uploadPath: 'assets/',
        asyncLimit: 4,
        headers: {
            'Cache-Control': 'max-age=315360000, no-transform, public'
        }
    };

    gulp.src(config.build + '/**')
        .pipe(gzip())
        .pipe(s3(s3_config, options));

});

/**
 * GULP COMMANDS
 */

gulp.task('watch', function () {
    gulp.watch([
        config.cvepdb + '/longwave/layouts/multigaming/*.scss',
        config.cvepdb + '/longwave/layouts/vitrine/*.scss',
        config.cvepdb + '/pages/layouts/admin/*.scss'
    ], function (event) {
        gulp.run('sass');
    });
});

gulp.task('build', ['bower', 'sass', 'copy'], function () {
});

gulp.task('production', ['bower', 'copy'], function () {
});

gulp.task('clean', function () {
    return gulp.src(config.build + '', {read: false}).pipe(clean());
});

gulp.task('copy', ['clean'], function () {
    return gulp.src([

        config.cvepdb + '/**',
        '!' + config.cvepdb + '/longwave/**',
        '!' + config.cvepdb + '/pages/**',
        '!' + config.cvepdb + '/sass/**',
        '!' + config.cvepdb + '/cvepdbjs/demo/**',
        '!' + config.cvepdb + '/cvepdbjs/documentation-cvepdbJS.html',
        '!' + config.cvepdb + '/cvepdbjs/readme.md',
        '!' + config.cvepdb + '/cvepdbjs/bower.json',

        config.clip + '/**',
        '!' + config.clip + '/index.html',

        config.longwave + '/**',
        '!' + config.longwave + '/html/**',
        '!' + config.longwave + '/images/art/**',
        '!' + config.longwave + '/original/**',
        '!' + config.longwave + '/scss/**',

        config.pages + '/assets/**',
        config.pages + '/pages/**',
        '!' + config.pages + '/pages/less/**',
        '!' + config.pages + '/pages/scss/**',

        '!**/node_modules/**',
        '!.gitgnore',
        '!package.json',
        '!Gruntfile.js',
        '!gulpfile.js'
    ]).pipe(gulp.dest(config.build));
});

gulp.task('default', function () {
    console.log("\nPage - Gulp Command List \n");
    console.log("----------------------------\n");
    console.log("gulp bower");
    console.log("gulp watch");
    console.log("gulp sass");
    console.log("gulp clean");
    console.log("gulp build");
    console.log("gulp production \n");
    console.log("----------------------------\n");
});