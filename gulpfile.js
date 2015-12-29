'use strict';

var path = require('path');
var gulp = require('gulp');
var less = require('gulp-less');
var sass = require('gulp-sass');
var clean = require('gulp-clean');
var minifycss = require('gulp-minify-css');

//CONFIG PATHS
var config = {
    pages: './resources/pages/pages',
    assets: './resources/pages/assets',
    longwave: './resources/longwave',
    layouts: './resources/layouts',
    partials: './resources/partials',
    cvepdb: './resources/cvepdb',
    clip: './resources/clip/clip-2',
    build: './public/dist'
};

gulp.task('less', function () {
    gulp.src(config.assets + '/less/style.less')
        .pipe(less({paths: [config.assets + '/less/']}))
        .pipe(gulp.dest(config.assets + '/css/'));
    gulp.src(config.pages + '/less/pages.less')
        .pipe(less({paths: [config.pages + '/less/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
});

gulp.task('sass', ['layouts-sass'],function () {});

gulp.task('pages-sass', function () {
    gulp.src(config.assets + '/sass/style.scss')
        .pipe(sass({paths: [config.assets + '/sass/']}))
        .pipe(gulp.dest(config.assets + '/css/'));
    gulp.src(config.pages + '/sass/pages.scss')
        .pipe(sass({paths: [config.pages + '/sass/']}))
        .pipe(gulp.dest(config.pages + '/css/'));
});

gulp.task('layouts-sass', function () {
    gulp.src(config.layouts + '/multigaming/*.scss')
        .pipe(sass({paths: [config.layouts + '/sass/']}))
        .pipe(gulp.dest(config.layouts + '/css/layouts/multigaming'));
    gulp.src(config.layouts + '/vitrine/*.scss')
        .pipe(sass({paths: [config.layouts + '/sass/']}))
        .pipe(gulp.dest(config.layouts + '/css/layouts/vitrine'));
});

gulp.task('watch', function () {
    gulp.watch([
        config.pages + '/less/*.less',
        config.assets + '/less/*.less',
        config.pages + '/sass/*.scss',
        config.assets + '/sass/*.scss'
    ], function (event) {
        gulp.run('less');
        gulp.run('sass');
    });
});

gulp.task('build', ['sass', 'less', 'copy'], function () {
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

            config.layouts + '/**',
            '!' + config.layouts + '/multigaming/**',
            '!' + config.layouts + '/vitrine/**',

            config.partials + '/**',
            '!' + config.partials + '/multigaming/**',
            '!' + config.partials + '/vitrine/**',

            config.cvepdb + '/**',
            '!' + config.cvepdb + '/sass/**',

            config.clip + '/**',
        
            config.longwave + '/**',
            '!' + config.longwave + '/images/art/**',
            '!' + config.longwave + '/sass/**',

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
            config.pages + '/css/*.css',
            config.layouts + '/css/layouts/multigaming/*.css',
            config.layouts + '/css/layouts/vitrine/*.css'
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