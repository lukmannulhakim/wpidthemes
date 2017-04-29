module.exports = function (grunt) {
	grunt.registerTask( 'css', ['sass', 'postcss', 'svg', 'cssmin'] );
};
