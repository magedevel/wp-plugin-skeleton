// Default Task - The master task used to build/re-build the project. Comment,
// un-comment or re-arrange to suit your specific needs.
// ----------------------------------------------------------------------------
module.exports = function( grunt ) {
	grunt.registerTask( 'default', [
		// 'sync',
		"sass",
		"postcss",
		"cssmin",
		"modernizr",
		"concat",
		"uglify",
		"newer:svgmin",
		"newer:imagemin",
		"clean",
		"notify:build"
	] );
};
