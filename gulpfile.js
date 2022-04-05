var gulp = require("gulp"),
	sass = require('gulp-sass')(require('sass')),
    rename = require("gulp-rename"),
    sourcemaps = require("gulp-sourcemaps"),
    notify = require("gulp-notify"),
	clean = require("gulp-clean"),
    plumber = require("gulp-plumber");
    zip = require('gulp-zip');
    const package = require('./package.json'); 

var tasks = {
    backendExpended: {src: "assets/scss/backend/main.scss", mode: 'expanded', destination: 'ps-backend.css'},
    backendCompressed: {src: "assets/scss/backend/main.scss", mode: 'compressed', destination: 'ps-backend.min.css'},
};

var task_keys = Object.keys(tasks);

var onError = function (err) {
	notify.onError({
		title: "Gulp",
		subtitle: "Failure!",
		message: "Error: <%= error.message %>",
		sound: "Basso",
	})(err);
	this.emit("end");
};

for(let task in tasks) {

    let blueprint = tasks[task];
    
    gulp.task(task, function () {
        return gulp
			.src(blueprint.src)
			.pipe(plumber({
				errorHandler: onError
			}))
			.pipe(sass({
				outputStyle: blueprint.mode
			}))
			.pipe(rename(blueprint.destination))
			.pipe(sourcemaps.write("."))
			.pipe(gulp.dest("assets/css"));        
    });
}

/*
 * series for doing multiple task in order 1->2->3
 * src is for getting files from the computer
 * dest is for transfer file to destination 
*/
const { series, src, dest } = require('gulp');
//install plugins

//clean existing build zip file
function cleanZip(cb) {
	return gulp.src("./*.zip", {
		read: false,
		allowEmpty: true
	}).pipe(clean());
	cb();
}


//clean file & folders from build

function cleanBuild(cb) {
	return gulp.src("./build", {
		read: false,
		allowEmpty: true
	}).pipe(clean());
	cb();
};

// bundle all files export to destination directory
function bundleFiles(cb){
	return src([
		"./**/*.*",
		"!./build/**",
		"!./assets/scss/**",
		"!./media/**",
		"!./node_modules/**",
		"!./**/*.zip",
		"!.github",
		"!./readme.md",
		"!./README.md",
		"!.DS_Store",
		"!./composer.json",
		"!./vendor/**",
		"!./**/.DS_Store",
		"!./LICENSE.txt",
		"!./package.json",
		"!./asset-manifest.json",
		"!./includes/modules/**/*.jsx",
	])
	.pipe(dest("build/plugin-starter"));
	cb();
}


// from destination directory take all files make zip
function exportZip(cb) {
	const buildName = `plugin-starter-v${package.version}.zip`;
	return src("./build/**/*.*").pipe(zip(buildName)).pipe(dest("./"));
	cb();
}


gulp.task("watch", function () {
	gulp.watch("assets/scss/**/*.scss", gulp.series(...task_keys));
});

exports.default 	= series(...task_keys, "watch");
exports.build 		= series(...task_keys, cleanZip,cleanBuild,bundleFiles, exportZip);