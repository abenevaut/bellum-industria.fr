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


var config = {
    build_assets: './public/assets',
    build_themes: './public/themes',
    revision: 'rev',
    css: 'css',
    sass: 'sass',
    js: 'js',
    themes: './resources/themes'
};

var themes = [];

/**
 * Create themes path list
 */
gulp.task('init', function () {
    list = fs.readdirSync(config.themes);
    list.forEach(function (filename) {
        if (!/^\..*/.test(filename)) {
            themes.push(config.themes + '/' + filename + '/assets/');
        }
    });
});

/**
 * If config.sass compile sass files to config.css.
 */
gulp.task('sass', ['bower'], function () {
    themes.forEach(function (theme_path) {
        gulp.src(theme_path + config.sass + '/*.scss')
            .pipe(sass({paths: [theme_path + config.sass]}))
            //.pipe(minifycss())
            .pipe(rev())
            .pipe(gulp.dest(theme_path + config.css))
            .pipe(rev.manifest())
            .pipe(rename('css.manifest.json'))
            .pipe(gulp.dest(theme_path + config.revision));
    });
});

/**
 * If bower.json exists in theme, install it.
 */
gulp.task('bower', ['init'], function () {
    themes.forEach(function (theme_path) {
        return bower({
            directory: 'bower',
            cwd: theme_path
        });
    });
});

/**
 * Clean public directory, compile sass files if exist and deploy compiled files in public directory
 */
gulp.task('build', ['clean', 'sass', 'deploy'], function () {});

/**
 * Clean config.build_assets directory
 */
gulp.task('clean', ['clean-themes'], function () {
    return gulp.src(config.build_assets + '', {read: false}).pipe(clean());
});

/**
 * Clean config.build_themes directory
 */
gulp.task('clean-themes', function () {
    return gulp.src(config.build_themes + '', {read: false}).pipe(clean());
});

/**
 * Deploy each theme in config.themes to config.build_themes
 */
gulp.task('deploy', ['clean'], function () {

    console.log( 'php artisan theme:publish' );

});

/**
 * Help, commands list
 */
gulp.task('default', function () {
    console.log("\nGulp Command List \n");
    console.log("----------------------------\n");
    console.log("gulp clean : clean public resources");
    console.log("gulp build : compile theme and deploy it in public dir");
    console.log("gulp deploy : make fresh copy of resources in public dir \n");
    console.log("----------------------------\n");
});
