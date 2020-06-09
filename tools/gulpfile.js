
const gulp = require('gulp');    // minimale Inhalt für ein Gulpfile
const sass = require('gulp-sass');  // Sass Plugin für Gulp
const gulpif = require("gulp-if");
const browserSync = require('browser-sync').create(); // Keep multiple browsers & devices in sync when building websites.
const autoprefixer = require("gulp-autoprefixer");
const cssnano = require('gulp-cssnano');
const uglify = require('gulp-uglify-es').default;
const rollup = require("gulp-better-rollup");
const babel = require("rollup-plugin-babel");
const resolveNodeModules = require("rollup-plugin-node-resolve");
const rename = require("gulp-rename");

let isProductionBuild = false;

// runSass function
function runSass() {
  return gulp
  .src('app/scss/**/*.scss')
  .pipe(sass()) // Konvertiere Sass zu CSS mit gulp-sass
  .pipe(autoprefixer())
  .pipe(gulpif(isProductionBuild, cssnano()))
  .pipe(
    gulpif(
      isProductionBuild,
      rename({
        suffix: ".min",
      })
    )
  )
  .pipe(
    gulpif(isProductionBuild, gulp.dest("dist/css/"), gulp.dest("app/css/"))
  )


  .pipe(cssnano())
  .pipe(gulp.dest('app/css'))
  .pipe(browserSync.stream());
}

/* reload function
* BrowserSync verwenden (HTML + JS)
* Einmal auf den Geschmack gekommen, möchten wir nun 
* aber auch bei Änderungen an den HTML- und JavaScript-Dateien einen LiveReload auslösen.
* Dazu ergänzen wir lediglich zwei Zeilen:
*/
function reload(done) {
  browserSync.reload();
  done();
}

function bundleJs() {
  return gulp
    .src('app/js/main.js')  //muss .src sein 
    .pipe(
      rollup(
        {
          plugins: [babel()],
        },
        { format: 'cjs' }
      )
    )
    .pipe(gulpif)
    .pipe(uglify())
    .pipe(
      rename({
        suffix: '-bundle',
      })
    ) 
    .pipe(gulp.dest('app/js/'));
}

// runWatch function wird verwendet um runSass + startBrowserSync + reload mit nur einer function aufzurufen.
function runWatch() {
  startBrowserSync();
    gulp.watch('app/scss/**/*.scss', runSass);
    gulp.watch('app/**/*.html', reload);
    gulp.watch(
      ["app/js/**/*.js", "!app/js/**/*-bundle.js"],
      gulp.series(bundleJs, reload)
    );
    // gulp.watch('app/js/**/*.js', reload);  zu viel mit bundle
}

// runSass function
function runSass() {
  return gulp
  .src('app/scss/**/*.scss')
  .pipe(sass()) // Konvertiere Sass zu CSS mit gulp-sass
  .pipe(gulp.dest('app/css'))
  .pipe(browserSync.stream());
}

// browserSync function  
function startBrowserSync() {
  browserSync.init({
  server: {
     baseDir: 'app' }
  });
}





// so können wir die functions aufrufen, z.B. gulp watch (watch ist die Schlüsselfunktion für die runWatch function)
gulp.task('sass', runSass);
gulp.task('watch', gulp.series(runSass, bundleJs, runWatch ));  //bundleJs aufrufen!!!!
  