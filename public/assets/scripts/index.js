var defer = require('lodash/function/defer');
var $ = require('./util/sprint');
var FastClick = require('./util/fastclick');

var Images = require('./util/loadImages');
var CSS = require('./util/loadStyles');

var ContactForm = require('./modules/form');


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
	var afterFirstLoad = this.afterFirstLoad

	this.loadStyleSheets(STYLESHEETS, function() {
		console.log('STYLESHEETS LOADED');
		$('body').addClass('js-load-finish');
		defer(afterFirstLoad);
	});
};


// ...................................................
// === Things that can wait until after first load ===
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
Portfolio.prototype.afterFirstLoad = function() {

	// Lazily load images
	new Images('[data-src]');

	// Initialize Fast Click
	if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();

	// Initialize Modules
	//this.initModules();
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
			if (loadedCount >= count && typeof callback === 'function') callback();
		};
		new CSS(s);
	});
};


window.portfolio = new Portfolio();


// 		WebFonts.load(function() {
// 			counter++;
// 			if (counter) jsLoad();
// 		});
// 		Styles.load(function() {
// 			counter++;
// 			if (counter) jsLoad();
// 		});
// 		new Images('[lazy-load]').load(function($i) {});
		
// 		if (GLOBAL_MODULES.form) Form.init('#contact');
// var ContactForm = require('./modules/form');
// var CSS = require('./util/styles');
