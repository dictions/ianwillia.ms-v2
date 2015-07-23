var defer = require('lodash/function/defer');
var $ = require('./util/sprint');
var FastClick = require('./util/fastclick');
var _contains = require('lodash/collection/contains');
var Router = require('./router');

var Images = require('./util/loadImages');
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
		defer(self.onFirstLoad.bind(self));
	});
};


// ...................................................
// === Things that can wait until after first load ===
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
Portfolio.prototype.onFirstLoad = function() {
	// Initialize Fast Click
	if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
	// Initialize Router
	this.router = new Router();
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
