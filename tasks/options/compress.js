module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/ck.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'ck/'
	}
};