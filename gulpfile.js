'use strict';

var path = require('path');
var gulp = require('gulp');
var less = require('gulp-less');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var minifycss = require('gulp-minify-css');

//CONFIG PATHS
var config = {
    pages: './resources/pages',
    assets: './resources/assets',
    build: './public/dist'
};

gulp.task('less', function () {
    gulp.src(config.assets + '/less/style.less')
        .pipe(less({paths: [config.assets + '/less/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
    gulp.src(config.pages + '/less/pages.less')
        .pipe(less({paths: [config.pages + '/less/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
});

gulp.task('sass', function () {
    gulp.src(config.assets + '/sass/style.sass')
        .pipe(sass({paths: [config.assets + '/sass/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
    gulp.src(config.pages + '/sass/pages.sass')
        .pipe(sass({paths: [config.pages + '/sass/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
});

gulp.task('watch', function () {
    gulp.watch([
        config.pages + '/less/*.less',
        config.assets + '/less/*.less',
        config.pages + '/sass/*.sass',
        config.assets + '/sass/*.sass'
    ], function (event) {
        gulp.run('less');
        gulp.run('sass');
    });
});

gulp.task('build', ['less', 'sass', 'copy'], function () {
    gulp.run('css-min');
});

gulp.task('clean', function () {
    return gulp.src(config.build + '', {read: false}).pipe(clean());
});

gulp.task('copy', ['clean'], function () {
    return gulp.src([
            config.assets + '/**',
            '!' + config.assets + '/less/**',
            '!' + config.assets + '/sass/**',
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

gulp.task('css-min', ['less', 'sass'], function () {
    return gulp.src([
            config.assets + '/css/*.css',
            config.pages + '/css/*.css'
        ])
        .pipe(minifycss());
});

gulp.task('default', function () {
    console.log("\nPage - Gulp Command List \n");
    console.log("----------------------------\n");
    console.log("gulp watch");
    console.log("gulp less");
    console.log("gulp build \n");
    console.log("----------------------------\n");
});