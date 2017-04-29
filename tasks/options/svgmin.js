module.exports = {
	options: {
		plugins: [
			{
				removeUselessStrokeAndFill: false
			}
		]
	},
	files: {
		files: [ {
			expand: true,
			cwd: 'assets/svg/src',
			src: ['**/*.svg'],
			dest: 'assets/svg/svg'
		} ]
	}
};
