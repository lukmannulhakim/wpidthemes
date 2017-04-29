module.exports = {
	dist: {
		options: {
			processors: [
				require('postcss-svg-fragments')(),
				require('autoprefixer')()
			]
		},
		files: {
			'assets/css/wpid.css': [ 'assets/css/wpid.css' ]
		}
	}
};
