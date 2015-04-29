var WebFonts = require('./util/fonts');
window.Form = require('./modules/form');

window.app = {
	init: function () {
		// Start loading fonts from Google
		WebFonts();
		if (window.initializeForm) Form.init('#contact');
	}
};

window.app.init();