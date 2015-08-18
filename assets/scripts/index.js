var FastClick = require('./util/fastclick');
var Router = require('./router');

// .......................
// === Portfolio Class ===
// ^^^^^^^^^^^^^^^^^^^^^^^
var Portfolio = function() {
	// Initialize Fast Click
	if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
	// Initialize Router
	this.router = new Router();	
};

window.portfolio = new Portfolio();
