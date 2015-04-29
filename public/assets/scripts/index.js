var FastClick = require('./util/fastclick');
var WebFonts = require('./util/fonts');
window.Form = require('./modules/form');

window.app = {
	init: function () {
		WebFonts();
		if (((('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch))) FastClick();
		if (window.initializeForm) Form.init('#contact');
	}
};

window.app.init();