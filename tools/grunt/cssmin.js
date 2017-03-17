// CSSMin Task - https://github.com/gruntjs/grunt-contrib-cssmin
// ----------------------------------------------------------------------------
module.exports = {
	// All Styles.
	// -------------------------------------
	all: {
		files: [ {
			expand: true,
			cwd: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.css_dir %>',
			src: ['*.css'],
			dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.css_dir %>',
			ext: '.min.css'
		} ]
	}
};
