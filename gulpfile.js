var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    livereload = require('gulp-livereload'),
    browserSync = require('browser-sync');
    
    // compile __SASS__ and add prefix
    gulp.task('sasss', function() {
        return gulp.src('resources/sass/*.scss').
        pipe(sass()).
        pipe(autoprefixer()).
        pipe(gulp.dest('public/css'))//.pipe(browserSync.stream())
        
    })
    gulp.task('watch',function(){
  /*      browserSync.init({
            server:'./test.html'
    z    });*/
        gulp.watch('resources/sass/**/*.scss',gulp.series('sasss'));
//        gulp.watch('resources/sass/**/*.scss').on('change', browserSync.reload);
    })


    