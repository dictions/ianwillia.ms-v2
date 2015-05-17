var loadCSS = require('./loadCSS');
var compat = typeof(Storage) !== 'undefined';
var loadedStyles = localStorage.getItem('cachedStyles');
var loaded = loadedStyles !== null;

var cacheFontsToStorage = function(styles) {
	localStorage.setItem('cachedStyles', styles);
}

var loadFontsFromStorage = function() {
	return localStorage.getItem('cachedStyles');
}

module.exports.load = function(cb) {
	if (compat) {
		if (loaded) {
			loadCSS.inject(loadedStyles);
			if (cb) cb();
		} else {
			loadCSS.load('/assets/styles/_dist/index.css', function(styles) {
				cacheFontsToStorage(styles);
				loadCSS.inject(styles);
				if (cb) cb();
			});
		}
	} else {
		getFonts(function(styles) {
			loadCSS.inject(styles);
			if (cb) cb();
		});
	}
};
