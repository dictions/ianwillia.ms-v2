var $ = require('./sprint');

var ImageLoad = function(selector) {
	this.$images = $(selector);
	this.init();
	return this;
};

ImageLoad.prototype.init = function() {
	this.$images.each(function() {
		var $image = $(this).addClass('loading');
		var src = $image.attr('data-src');

		// Setup Load
		var loadingImage = new Image();
		loadingImage.onload = function() {
			$image.attr('src', src);
			$image.addClass('loaded');
		};

		// Trigger load
		loadingImage.src = src;
	});
};

module.exports = ImageLoad;