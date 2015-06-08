var $ = require('./sprint');

var ImageLoad = function(selector) {
	this.$images = $(selector);
	return this;
};

ImageLoad.prototype.load = function(callback) {
	this.$images.each(function() {
		var $image = $(this);
		var src = $image.attr('src');

		// Prevent loading
		$image.removeAttr('src').addClass('loading');

		// Setup Load
		var loadingImage = new Image();
		loadingImage.onload = function() {
			$image.attr('src', src);
			$image.addClass('loaded');
			if (typeof(callback) === 'function') callback($image);
		};

		// Trigger load
		loadingImage.src = src;
	});
};

module.exports = ImageLoad;