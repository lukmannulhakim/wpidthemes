module.exports = function (grunt) {
	grunt.registerTask( 'svg', ['clean', 'svgmin', 'svgstore'] );
};
