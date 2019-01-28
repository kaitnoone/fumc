/*------------------------------------------------------------------------------
  Gulpfile.js
------------------------------------------------------------------------------*/
// Theme information (name, starting theme version)
var theme = "FUMC",
  version = "0.0.1"; // updated with gulp version task, do not edit here.

// Set the paths you will be working with
var phpFiles = ["./**/*.php", "./*.php"],
  htmlFiles = ["./**/*.html", "./*.html"],
  cssFiles = ["./assets/css/*.css", "!./assets/css/*.min.css"],
  sassFiles = ["./assets/src/scss/**/*.scss"],
  styleFiles = [cssFiles, sassFiles],
  jsFiles = ["./assets/src/js/*.js"],
  imageFiles = ["./assets/src/images/**/*.{jpg,png,gif}"],
  concatFiles = [
    "./node_modules/bowser/bowser.js",
    "./assets/src/js/*.js",
    "!./assets/js/font-awesome.config.js",
    "!./assets/js/theme.min.js",
    "!./assets/js/all.js"
  ],
  url = "localhost:8888/fumc"; // See https://browsersync.io/docs/options/#option-proxy

// Include gulp
var gulp = require("gulp");

// Include plugins
var sass = require("gulp-sass"),
  sassGlob = require("gulp-sass-glob"),
  mmq = require("gulp-merge-media-queries"),
  concat = require("gulp-concat"),
  eslint = require("gulp-eslint"),
  uglify = require("gulp-uglify"),
  rename = require("gulp-rename"),
  imagemin = require("gulp-imagemin"),
  nano = require("gulp-cssnano"),
  sourcemaps = require("gulp-sourcemaps"),
  autoprefixer = require("gulp-autoprefixer"),
  browserSync = require("browser-sync"),
  plumber = require("gulp-plumber"),
  notify = require("gulp-notify"),
  replace = require("replace"),
  argv = require("yargs").usage(
    "Usage: $ gulp version [--major, --minor, --patch, --current]"
  ).argv,
  colors = require("colors"),
  exec = require("child_process").exec,
  zip = require("gulp-zip"),
  reload = browserSync.reload;

var patternPaths = {
  patterns: [
    "pattern-library/**/*.html",
    "pattern-library/**/*.md",
    "pattern-library/data.json"
  ]
};

/*------------------------------------------------------------------------------
  Development Tasks
------------------------------------------------------------------------------*/
// Launch a development server
gulp.task("serve", function() {
  browserSync.init({ server: "./pattern-library" });

  gulp.watch(sassFiles, ["styles"]).on("change", reload);
  gulp.watch(patternPaths.patterns).on("change", reload);
});

// Compile Sass
gulp.task("sass", function() {
  return gulp
    .src(sassFiles)
    .pipe(sassGlob())
    .pipe(plumber())
    .pipe(
      sass({ includePaths: ["./node_modules/normalize-scss/sass/"] })
        .on("error", sass.logError)
        .on("error", notify.onError("Error compiling scss!"))
    )
    .pipe(
      autoprefixer({
        browsers: ["last 3 versions", "Safari > 7"],
        cascade: false
      })
    )
    .pipe(mmq({ log: true }))
    .pipe(gulp.dest("./assets/css/"))
    .pipe(gulp.dest("./pattern-library/assets/css/"))
    .pipe(reload({ stream: true }));
});

// Lint JavaScript
gulp.task("lint", function() {
  return gulp.src(jsFiles).pipe(plumber());
  /*.pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());*/
});

/*------------------------------------------------------------------------------
  Production Tasks
------------------------------------------------------------------------------*/
// Minimize CSS
gulp.task("minify-css", ["sass"], function() {
  return gulp
    .src(cssFiles)
    .pipe(sourcemaps.init())
    .pipe(rename({ suffix: ".min" }))
    .pipe(
      nano({
        discardComments: { removeAll: false },
        autoprefixer: false,
        discardUnused: false,
        mergeIdents: false,
        reduceIdents: false,
        calc: { mediaQueries: true },
        zindex: false
      })
    )
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./pattern-library/assets/css"))
    .pipe(gulp.dest("./assets/css"))
    .pipe(reload({ stream: true }));
});

// Concatenate & Minify JavaScript
gulp.task("scripts", function() {
  return (
    gulp
      .src(jsFiles)
      // .pipe(uglify())
      .pipe(gulp.dest("./pattern-library/assets/js"))
      .pipe(gulp.dest("./assets/js"))
      .pipe(reload({ stream: true }))
  );
});

// Compress Images
gulp.task("images", function() {
  return gulp
    .src(imageFiles)
    .pipe(plumber())
    .pipe(imagemin())
    .pipe(gulp.dest("./pattern-library/assets/images"))
    .pipe(gulp.dest("./assets/img/"));
});

// Package a zip for theme upload
gulp.task("package", function() {
  return gulp
    .src([
      "./**/*",
      "!bower_components",
      "!node_modules",
      "!bower_components/**",
      "!node_modules/**"
    ])
    .pipe(zip(theme + ".zip"))
    .pipe(gulp.dest("./"));
});

// Update Theme Version
gulp.task("version", function(cb) {
  // get current version
  var currentVersion = version.split(/[.]+/);

  if (argv.patch) {
    // log current version
    console.log("Current version is: " + version.yellow);

    console.log("Updating theme version as a patch.".cyan);

    // increment patch number
    currentVersion[2]++;
    var newPatch = currentVersion[2];

    // New Version Number
    var newVersion =
      currentVersion[0] + "." + currentVersion[1] + "." + newPatch;
    console.log("New theme version is: ".green + newVersion.green.bold);

    // first replace updates strings
    replace({
      regex: version,
      replacement: newVersion,
      paths: ["./style.css", "./functions.php", "./gulpfile.js"],
      silent: true
    });

    exec(
      `git commit -am "Bumps theme version to ${newVersion}" && npm version patch`,
      function(err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
        cb(err);
      }
    );
  } else if (argv.minor) {
    // log current version
    console.log("Current version is: " + version.yellow);

    console.log("Updating theme version as a minor release.".cyan);

    // increment minor number
    currentVersion[1]++;
    var newMinor = currentVersion[1];

    // New Version Number
    var newVersion = currentVersion[0] + "." + newMinor + "." + "0";
    console.log("New theme version is: ".green + newVersion.green.bold);

    replace({
      regex: version,
      replacement: newVersion,
      paths: ["./style.css", "./functions.php", "./gulpfile.js"],
      silent: true
    });

    exec(
      `git commit -am "Bumps theme version to ${newVersion}" && npm version minor`,
      function(err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
        cb(err);
      }
    );
  } else if (argv.major) {
    // log current version
    console.log("Current version is: " + version.yellow);

    console.log("Updating theme version as a major release.".cyan);

    // increment minor number
    currentVersion[0]++;
    var newMajor = currentVersion[0];

    // New Version Number
    var newVersion = newMajor + "." + "0" + "." + "0";
    console.log("New theme version is: ".green + newVersion.green.bold);

    replace({
      regex: version,
      replacement: newVersion,
      paths: ["./style.css", "./functions.php", "./gulpfile.js"],
      silent: true
    });

    exec(
      `git commit -am "Bumps theme version to ${newVersion}" && npm version major`,
      function(err, stdout, stderr) {
        console.log(stdout);
        console.log(stderr);
        cb(err);
      }
    );
  } else if (argv.current) {
    // log current version
    console.log("Current version is: " + version.yellow);
  } else {
    // log current version
    console.log("Current version is: " + version.yellow);
    console.error(
      "🚨 No arguments or invalid arguments were passed. Include one of the following arguments: [--major, --minor, --patch, --current]"
        .red.bold
    );
  }
});

// Build task to run all tasks and and package for distribution
gulp.task("build", ["sass", "scripts", "images", "package"]);

// Styles Task - minify-css is the only task we call, because it is dependent upon sass running first.
gulp.task("styles", ["minify-css"]);

/*------------------------------------------------------------------------------
  Default Tasks
------------------------------------------------------------------------------*/
// Default Task
gulp.task("default", ["styles", "scripts", "serve", "watch"]);

// Watch Files For Changes
gulp.task("watch", function() {
  gulp.watch(sassFiles, ["styles"]);
  gulp.watch(jsFiles, ["scripts"]);
  gulp.watch(phpFiles, reload);
  gulp.watch(htmlFiles, reload);
});
