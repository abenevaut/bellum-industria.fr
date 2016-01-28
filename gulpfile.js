'use strict';

var path = require('path');
var gulp = require('gulp');
var less = require('gulp-less');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var minifycss = require('gulp-minify-css');
var bower = require('gulp-bower');

//CONFIG PATHS
var config = {
    clip: './resources/assets/clip/clip-2',
    cvepdb: './resources/assets/cvepdb',
    longwave: './resources/longwave',
    pages: './resources/pages/html',
    build: './public/assets'
};

gulp.task('sass', ['cvepdb-longwave-layouts-sass', 'cvepdb-pages-layouts-sass'], function () {

});

gulp.task('cvepdb-longwave-layouts-sass', function () {

    gulp.src(config.cvepdb + '/longwave/layouts/multigaming/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(gulp.dest(config.cvepdb + '/css/multigaming'));

    gulp.src(config.cvepdb + '/longwave/layouts/vitrine/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(gulp.dest(config.cvepdb + '/css/vitrine'));

});

gulp.task('cvepdb-pages-layouts-sass', function () {

    gulp.src(config.cvepdb + '/pages/layouts/admin/*.scss')
        .pipe(sass({paths: [config.cvepdb + '/sass/']}))
        .pipe(gulp.dest(config.cvepdb + '/css/admin'));

});

gulp.task('css-min', ['sass'], function () {
    return gulp.src([
        config.cvepdb + '/css/admin/*.css',
        config.cvepdb + '/css/multigaming/*.css',
        config.cvepdb + '/css/vitrine/*.css'
    ]).pipe(minifycss());
});

gulp.task('cvepdb-cvepdbjs-bower', function() {
    return bower({ directory: './libs', cwd: config.cvepdb + '/cvepdbjs'});
});

gulp.task('watch', function () {
    gulp.watch([

        config.cvepdb + '/longwave/layouts/multigaming/*.scss',
        config.cvepdb + '/longwave/layouts/vitrine/*.scss',

        config.cvepdb + '/pages/layouts/admin/*.scss'

    ], function (event) {
        gulp.run('sass');
    });
});

gulp.task('build', ['cvepdb-cvepdbjs-bower', 'sass', 'copy'], function () {
    gulp.run('css-min');
});

gulp.task('clean', function () {
    return gulp.src(config.build + '', {read: false}).pipe(clean());
});

gulp.task('copy', ['clean'], function () {
    return gulp.src([


        config.cvepdb + '/**',
        '!' + config.cvepdb + '/sass/**',


        config.clip + '/**',


        config.longwave + '/**',
        '!' + config.longwave + '/images/art/**',
        '!' + config.longwave + '/sass/**',


        config.pages + '/**',
        '!' + config.pages + '/less/**',
        '!' + config.pages + '/sass/**',


        '!**/node_modules/**',
        '!.gitgnore',
        '!package.json',
        '!Gruntfile.js',
        '!gulpfile.js'
    ])
        .pipe(gulp.dest(config.build));
});

gulp.task('default', function () {
    console.log("\nPage - Gulp Command List \n");
    console.log("----------------------------\n");
    console.log("gulp watch");
    console.log("gulp less");
    console.log("gulp build \n");
    console.log("----------------------------\n");
});