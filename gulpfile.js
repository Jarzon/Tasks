var es = require('event-stream');
var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require("gulp-rename");
var merge = require('gulp-merge-json');
var del = require('del');
var config = require('./app/config/assets.json');

gulp.task('js-clean', function () {
    return del(['public/js/*']);
});

gulp.task('css-clean', function () {
    return del(['public/css/*']);
});

gulp.task('img-clean', function () {
    return del(['public/img/*']);
});

gulp.task('msg-clean', function () {
    return del(['app/config/messages.json']);
});

gulp.task('js-build', function() {
    var tasks = config.js.files.map(function(file) {
        return gulp.src(file[0])
            .pipe(concat(file[1]))
            .pipe(gulp.dest(config.js.destination));
    });

    return es.concat.apply(null, tasks);
});

gulp.task('css-build', function() {
    var tasks = config.css.files.map(function(file) {
        return gulp.src(file[0])
            .pipe(concat(file[1]))
            .pipe(gulp.dest(config.css.destination));
    });

    return es.concat.apply(null, tasks);
});

gulp.task('img-build', function() {
    var tasks = config.img.files.map(function(file) {
        return gulp.src(file[0])
            .pipe(rename(function (path) {
                path.dirname = file[1];
            }))
            .pipe(gulp.dest(config.img.destination));
    });

    return es.concat.apply(null, tasks);
});

gulp.task('msg-build', function() {
    gulp.src('src/**/config/messages.json')
        .pipe(merge({fileName: 'messages.json', jsonSpace: ''}))
        .pipe(gulp.dest('app/config/'));
});

gulp.task('watch', function() {
    gulp.watch('src/**/assets/js/*.js', ['js-clean', 'js-build']);
    gulp.watch('src/**/assets/css/*.css', ['css-clean', 'css-build']);
    gulp.watch('src/**/assets/img/*', ['img-clean', 'img-build']);
    gulp.watch('src/**/config/messages.json', ['msg-clean', 'msg-build']);
});

gulp.task('default', ['watch'], function(){});