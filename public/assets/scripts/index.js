var WebFonts = require('./util/fonts');

window.app = {
	init: function () {
		// Start loading fonts from Google
		WebFonts();
	}
};

window.app.init();