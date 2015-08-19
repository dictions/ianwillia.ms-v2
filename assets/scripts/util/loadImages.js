var $ = require('./sprint');

var ImageLoad = function(selector, wait) {
	this.$images = $(selector);
	this.init(wait);
	return this;
};

ImageLoad.prototype.init = function(wait) {
	this.$images.each(function() {
		var $image = $(this).addClass('loading');
		var src = $image.attr('data-src');

		// Setup Load
		var loadingImage = new Image();
		loadingImage.onload = (!wait) ? function() {
			$image.attr('src', src);
			$image.addClass('loaded');
		} : function() {
			$image.attr('src', src);
			// prevent home jank
			setTimeout(function() { $image.addClass('loaded'); }, 200);
		};

		// Trigger load
		loadingImage.src = src;
	});
};

module.exports = ImageLoad;