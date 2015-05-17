var FastClick = require('./util/fastclick');
var WebFonts = require('./util/fonts');
var Styles = require('./util/loadStyles');
window.Form = require('./modules/form');

var counter = -1;

var jsLoad = function() {
	document.getElementById('body').className += ' js-load-finish';
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
		if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
		if (GLOBAL_MODULES.form) Form.init('#contact');
	}
};

window.app.init();