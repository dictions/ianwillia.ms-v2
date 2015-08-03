var defer = require('lodash/function/defer');
var $ = require('./util/sprint');
var FastClick = require('./util/fastclick');
var _contains = require('lodash/collection/contains');
var Router = require('./router');

var CSS = require('./util/loadStyles');



// .......................
// === Portfolio Class ===
// ^^^^^^^^^^^^^^^^^^^^^^^
var Portfolio = function() {
	this.init();
};


// ......................
// === Initialize App ===
// ^^^^^^^^^^^^^^^^^^^^^^
Portfolio.prototype.init = function() {
	var self = this;
	this.loadStyleSheets(STYLESHEETS, function() {
		defer(function() {
			// Initialize Fast Click
			if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
			// Initialize Router
			self.router = new Router();	
		});
	});
};

// ............................
// === Load Fonts, CSS, etc ===
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^
var STYLESHEETS = [
	{
		src: '/assets/fonts/fonts.css',
		storageKey: 'base64fonts'
	},
	{
		src: '/assets/styles/_dist/index.css',
		storageKey: 'cachedStyles'
	}
];

// ............................
// === Load all stylesheets ===
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^
Portfolio.prototype.loadStyleSheets = function(stylesheets, callback) {
	var count = stylesheets.length;
	var loadedCount = 0;

	stylesheets.forEach(function(s) {
		s.callback = function() {
			loadedCount++;
			if (loadedCount >= count) callback();
		};
		new CSS(s);
	});
};


window.portfolio = new Portfolio();
