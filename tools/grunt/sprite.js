// Spritesmith Task - https://github.com/Ensighten/grunt-spritesmith
// ----------------------------------------------------------------------------
module.exports = {
	// Generate an image sprite from PNG
	// assets along with useful Sass
	// variables.
	// -------------------------------------
	all: {
		src: [
			'<%= pluginInfo.assets_path_dev %>/<%= pluginInfo.img_dir %>/*.png',
			'!<%= pluginInfo.assets_path_dev %>/<%= pluginInfo.img_dir %>/sprite.png'
		],
		dest: '<%= pluginInfo.assets_path %>/<%= pluginInfo.img_dir %>/sprite.png',
		destCss: '<%= pluginInfo.assets_path_dev %>/<%= pluginInfo.scss_dir %>/base/_sprites.scss',
		imgPath: '<%= pluginInfo.assets_path_dev %>/<%= pluginInfo.img_dir %>/sprite.png?' + ( new Date().getTime() ),
	}
};
