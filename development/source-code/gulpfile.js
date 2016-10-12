var elixir = require('laravel-elixir'),
    gulp = require('gulp');
// browserSync = require('browser-sync').create(),
// browserSyncOptions = {
//     proxy: {
//         target: "localhost:8000"
//     }
// };
require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', 'public/assets/css')
        .task('js', 'resources/assets/js/**/*.*')
        .task('angular', 'resources/app/**/*.*')
        .task('img', 'resources/assets/img/**/*.*');
    // .task('sync');
});

gulp.task('js', function() {
    return gulp.src(['resources/assets/js/**/*.*'])
        .pipe(gulp.dest('public/assets/js/'));
});

gulp.task('angular', function() {
    return gulp.src(['resources/app/**/*.*'])
        .pipe(gulp.dest('public/app'));
});

gulp.task('img', function() {
    return gulp.src(['resources/assets/img/**/*.*'])
        .pipe(gulp.dest('public/assets/img'));
});

gulp.task('sync', function() {
    // browserSync.init(browserSyncOptions);
    // gulp.watch('./**/*.*')
    //     .on('change', function(event) {
    //         browserSync.reload();
    //     });
});