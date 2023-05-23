'use strict';

const gulp         = require('gulp');
const { watch, series }   = require('gulp');
const fractal      = require('./fractal.js');
const logger       = fractal.cli.console;
const sass         = require('gulp-sass');
const sassGlob     = require('gulp-sass-glob');
const plumber      = require('gulp-plumber');
const notify       = require('gulp-notify');
const autoprefixer = require('gulp-autoprefixer');
const fs           = require('fs');
const path         = require('path');
const uglify       = require('gulp-uglify');
const babel        = require('gulp-babel');

const sassPaths = [
    'node_modules/foundation-sites/scss'
];

function customPlumber(errTitle) {
    return plumber({
        errorHandler: notify.onError({
            title: errTitle || "Error running Gulp",
            message: "Error: <%= error.message %>",
        })
    });
}

function getFolders(dir) {
    return fs.readdirSync(dir)
      .filter(function(file) {
        return fs.statSync(path.join(dir, file)).isDirectory();
      });
}

function startFractal(cb) {
    const server = fractal.web.server({
        sync: true
    });
    server.on('error', err => logger.error(err.message));
    return server.start().then(() => {
        logger.success(`Fractal server is now running at ${server.url}`);
    });
    cb();
}

function buildFractal(cb) {
    const builder = fractal.web.builder();
    builder.on('progress', (completed, total) => logger.update(`Exported ${completed} of ${total} items`, 'info'));
    builder.on('error', err => logger.error(err.message));
    return builder.build().then(() => {
        logger.success('Fractal build completed!');
    });
    cb();
}

function buildSass(cb) {
    return (
        gulp.src([
            'src/assets/css/**/*.scss'
        ])
        .pipe(customPlumber('Error running Sass'))
        .pipe(sassGlob())
        .pipe(sass({
            includePaths: sassPaths
          }))
        .pipe(autoprefixer())
        .pipe(gulp.dest('static/css'))
    );
}

function copyJavaScript(cb) {
    return (
        gulp.src('src/assets/js/**/*')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(gulp.dest('static/js/'))
    );
} 

function copySVG(cb) {
    return (
        gulp.src('src/assets/svg/**/*')
        .pipe(gulp.dest('static/svg/'))
    );
} 

function watchForChanges(cb) {
    watch([
        'src/components/**/*.scss',
        'src/assets/css/**/*.scss'
    ], buildSass);

    watch([
        'src/assets/js/**/*.js'
    ], copyJavaScript);
} 

exports.default = series(startFractal, copyJavaScript, copySVG, buildSass, watchForChanges);
exports.build = series(buildFractal, copyJavaScript, copySVG, buildSass);
