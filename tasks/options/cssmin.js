module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%=pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed' +
		' */\n'
	},
	minify: {
		expand: true,

		cwd: 'assets/css/',
		src: ['wpid.css','editor.css'],

		dest: 'assets/css/',
		ext: '.min.css'
	}
};
