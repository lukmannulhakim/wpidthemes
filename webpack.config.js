var path = require('path');
var webpack = require('webpack');

var loaders = [
	{
		test: /\.jsx?$/,
		exclude: /(node_modules|bower_components)/,
		loader: 'babel'
	}
];

module.exports = [
	{
	    entry: './assets/js/src/server.js',
	    output: {
	        path: __dirname,
	        filename: './assets/js/server.js'
	    },
	    module: {
			loaders: loaders
		},
	    stats: {
	        colors: true
	    }
	},
	{
	    entry: './assets/js/src/includes.js',
	    output: {
	        path: __dirname,
	        filename: './assets/js/includes.js',
			libraryTarget: 'var',
			library: 'includes'
	    },
	    module: {
			loaders: loaders
		},
	    stats: {
	        colors: true
	    }
	},
	{
	    entry: './assets/js/src/client.js',
	    output: {
	        path: __dirname,
	        filename: './assets/js/client.js'
	    },
	    module: {
			loaders: loaders
		},
	    stats: {
	        colors: true
	    }
	}
];
