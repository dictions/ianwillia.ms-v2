var css = require('./loadCSS');
var compat = typeof(Storage) !== 'undefined';
var defer = require('lodash/function/defer');
var noop = function() {};

var LoadStyles = function(opts) {
	this.init(opts);
};

LoadStyles.prototype.init = function(opts) {

	var callback = (typeof opts.callback === 'function') ? opts.callback : noop;
	var styleSheet = opts.src;
	var storageKey = opts.storageKey;

	var loadedStyles = localStorage.getItem(storageKey);
	var loaded = loadedStyles !== null;

	if (loaded) {
		css.inject(loadedStyles);
		callback();
	} else {
		css.load(styleSheet, function injectCss(styles) {
			css.inject(styles);
			callback();
			defer(function() { // Lazily add to localStorage
				localStorage.setItem(storageKey, styles);
			});
		});	
	}
};

module.exports = LoadStyles;