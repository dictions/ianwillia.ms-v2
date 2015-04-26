var WebFont = require('components-webfontloader');
 
module.exports = function() {
	window.WebFont.load({
		custom: {
			families: ['Apercu', 'Apercu Mono', 'GTS'],
			urls: ['/assets/fonts/fonts.css']
		},
		timeout: 2000 // Set the timeout to two seconds
	});
};

