// Uglify Task - https://github.com/gruntjs/grunt-contrib-uglify
// ----------------------------------------------------------------------------
module.exports = {
	// Uglify all of our JS assets.
	// -------------------------------------
	options: {
		banner: '/*! <%= package.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
		// Turning off mangling keeps the original
		// code intact, reducing errors.
		// -------------------------------------
		mangle: false,
		// Generate a sourcemap for each
		// Javascript file.
		// -------------------------------------
		sourceMap: false
	},
	// Public JS.
	// -------------------------------------
	public: {
		files: {
			'<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-public.min.js': [ '<%= concat.public.dest %>' ]
		}
	},
	// Admin JS.
	// -------------------------------------
	admin: {
		files: {
			'<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-admin.min.js': [ '<%= concat.admin.dest %>' ]
		}
	},
	// Gutenberg Editor JS.
 	// -------------------------------------
	gutenberg_editor: {
		files: {
			'<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-editor.min.js': [ '<%= concat.gutenberg_editor.dest %>' ]
		}
	},
	// Gutenberg Editor JS.
 	// -------------------------------------
	gutenberg_front: {
		files: {
			'<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-front.min.js': [ '<%= concat.gutenberg_front.dest %>' ]
		}
	}
};
