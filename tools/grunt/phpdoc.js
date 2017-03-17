// PHPdoc Task - https://github.com/chrisklaussner/grunt-phpdoc
// ----------------------------------------------------------------------------
module.exports = {
	// Generate plugin documentation.
	// -------------------------------------
	plugin: {
		src: [
			'php/',
			'views/',
		],
		dest: '<%= pluginInfo.docs_path %>/php'
	}
}
