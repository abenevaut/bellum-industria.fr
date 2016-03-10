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

var elixir = require('laravel-elixir');

//CONFIG PATHS
var config = {

    // theme paths
    theme_admin: './resources/assets/theme_admin',

    // publit assets path
    build: './public/assets',

    // style / scripts revision directories
    revision: './public/assets/rev/',
    revision_admin: 'admin',

    // bower stuff directories
    bower: './resources/assets',
    bower_public: 'bower'

};

/**
 * SASS STUFF
 */

gulp.task('sass', ['sass-theme_admin'], function () {});

gulp.task('sass-theme_admin', function () {
    gulp.src(config.theme_admin + '/sass/*.scss')
        .pipe(sass({paths: [config.theme_admin + '/sass/']}))
        //.pipe(minifycss())
        .pipe(rev())
        .pipe(gulp.dest(config.theme_admin + '/css'))
        .pipe(rev.manifest())
        .pipe(rename('css.manifest.json'))
        .pipe(gulp.dest(config.revision + config.revision_admin));
});

/**
 * BOWER STUFF
 */

gulp.task('bower', function () {
    return bower({
        directory: config.bower_public,
        cwd: config.bower
    });
});

gulp.task('deploy', ['bower', 'copy'], function () {});

gulp.task('build', ['bower', 'sass', 'copy'], function () {});

gulp.task('clean', function () {
    return gulp.src(config.build + '', {read: false}).pipe(clean());
});

gulp.task('copy', ['clean'], function () {
    return gulp.src([


        config.theme_admin + '/**',
        '!' + config.theme_admin + '/sass/**',


        '!**/node_modules/**',
        '!.gitgnore',
        '!package.json',
        '!Gruntfile.js',
        '!gulpfile.js'
    ]).pipe(gulp.dest(config.build));
});

gulp.task('default', function () {
    console.log("\nGulp Command List \n");
    console.log("----------------------------\n");
    console.log("gulp bower : get packages from bower");
    console.log("gulp clean : clean public resources");
    console.log("gulp build : compile theme and deploy it in public dir");
    console.log("gulp deploy : make fresh copy of resources in public dir \n");
    console.log("----------------------------\n");
});
