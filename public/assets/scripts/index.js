var FastClick = require('./util/fastclick');
var WebFonts = require('./util/fonts');
var Styles = require('./util/loadStyles');
var Images = require('./util/loadImages');
window.Form = require('./modules/form');

var counter = -1;

var jsLoad = function() {
	setTimeout(function() {
		console.log('loaded');
		document.getElementById('body').className += ' js-load-finish';
	}, 800);
}

window.app = {
	init: function () {
		WebFonts.load(function() {
			counter++;
			if (counter) jsLoad();
		});
		Styles.load(function() {
			counter++;
			if (counter) jsLoad();
		});
		new Images('[lazy-load]').load(function($i) {});
		if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
		if (GLOBAL_MODULES.form) Form.init('#contact');
	}
};

window.app.init();