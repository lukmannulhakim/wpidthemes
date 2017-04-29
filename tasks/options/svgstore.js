module.exports = {
	main: {
		files: {
			'assets/svg/symbol-defs.svg': ['assets/svg/svg/*.svg']
		},
		options: {
			cleanup: true,
			inheritviewbox: true,
			prefix : 'icon-',
			formatting : {
				indent_with_tabs: true
			},
			svg: {
				style: "position: absolute; width: 0; height: 0; overflow: hidden;",
				version: "1.1",
				xmlns: "http://www.w3.org/2000/svg",
			},
			symbol: {
				preserveAspectRatio: 'none slice'
			}
		}
	}
};
