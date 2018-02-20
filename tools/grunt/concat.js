// Concat Task - https://github.com/gruntjs/grunt-contrib-concat
// ----------------------------------------------------------------------------
module.exports = {
	options: {
		separator: '\r\n\r\n',
	},
	// Public JS.
	// -------------------------------------
	public: {
		src: ['<%= concatPublic %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-public.js',
		nonull: true
	},
	public_min: {
		src: ['<%= concatPublic %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-public.tmp.js',
		nonull: true
	},
	// Admin JS.
	// -------------------------------------
	admin: {
		src: ['<%= concatAdmin %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-admin.js',
		nonull: true
	},
	admin_min: {
		src: ['<%= concatAdmin %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-admin.tmp.js',
		nonull: true
	},
	// Customizer JS.
	// -------------------------------------
	customizer: {
		src: ['<%= concatCustomizer %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-customizer.js',
		nonull: true
	},
	customizer_min: {
		src: ['<%= concatCustomizer %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-customizer.tmp.js',
		nonull: true
	},
	// Gutenberg Editor JS.
	// -------------------------------------
	gutenberg_editor: {
		src: ['<%= concatGutenbergEditor %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-editor.js',
		nonull: true
	},
	gutenberg_editor_min: {
		src: ['<%= concatGutenbergEditor %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-editor.tmp.js',
		nonull: true
	},
	// Gutenberg Front JS.
	// -------------------------------------
	gutenberg_front: {
		src: ['<%= concatGutenbergFront %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-front.js',
		nonull: true
	},
	gutenberg_front_min: {
		src: ['<%= concatGutenbergFront %>'],
		dest: '<%= pluginInfo.assets_path_prod %>/<%= pluginInfo.js_dir %>/plugin-name-gutenberg-front.tmp.js',
		nonull: true
	}
};
