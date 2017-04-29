module.exports = {
	livereload: {
		files: ['assets/css/*.css', 'assets/js/src/**/*.js'],
		options: {
			livereload: true
		}
	},
	css: {
		files: ['assets/css/sass/**/*.scss'],
		tasks: ['css'],
		options: {
			debounceDelay: 500
		}
	}
};
