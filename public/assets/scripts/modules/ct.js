var $ = require('../util/sprint');
var _debounce = require('lodash/function/debounce');

var initialize = function(ctSelector) {
	this.$ct = $(ctSelector);
	this.$image = this.$ct.find('img');
	this.$thumb = this.$ct.find('[range-thumb]');
	this.$track = this.$ct.find('[range-track]');
	this.rangeActive = false;
	this.rangePosition = 0;
	listen.call(this);
};

var listen = function() {
	this.$track.on('mousedown', rangeActive.bind(this));
	this.$track.on('mouseup', rangeInactive.bind(this));
};

var rangeActive = function(e) {
	var self = this;
	this.rangeActive = true;

	var rangeLeft = e.currentTarget.getBoundingClientRect().left;
	var rangeWidth = e.currentTarget.offsetWidth;

	var deactivateSlider = function(e) {
		self.rangeActive = false;
		document.removeEventListener('mouseup', deactivateSlider);
		document.removeEventListener('mousemove', dragSlider);
		document.removeEventListener('touchend', deactivateSlider);
		document.removeEventListener('touchmove', dragSlider);
	};

	var dragSlider = function(e) {
		if (self.rangeActive && e.pageX >= rangeLeft && e.pageX <= (rangeLeft + rangeWidth)) {
			self.rangePosition = Math.round(((e.pageX - rangeLeft) / rangeWidth) * 60);
			setPosition.call(self);
			setImage.call(self);
		}
	};

	document.addEventListener('mousemove', dragSlider);
	document.addEventListener('mouseup', deactivateSlider);
	document.addEventListener('touchmove', dragSlider);
	document.addEventListener('touchend', deactivateSlider);

};

var rangeInactive = function(e) {
	this.rangeActive = false;
};

var setPosition = function() {
	this.$thumb.css('left', (this.rangePosition / 60 * 100) + '%');
	this.$thumb.attr('data-content', '—' + (this.rangePosition * 3) + 'DEG' + (this.rangePosition * 3).toString(2));
};

var setImage = _debounce(function(){
	var rec = this.$image.dom[0].getBoundingClientRect();
	var w = rec.height;
	var max = w * 59;
	var t = (max > w * this.rangePosition) ? w * this.rangePosition : max;
	this.$image.dom[0].setAttribute('style', translateX(-t / rec.width * 100));
});

var translateX = function(x) {
	var tr = '-webkit-transform: translateX(' + x + '%);' + 
		'-moz-transform: translateX(' + x + '%);' + 
		'-ms-transform: translateX(' + x + '%);' + 
		'-o-transform: translateX(' + x + '%);' +
		'transform: translateX(' + x + '%);';
	return tr;
};

module.exports.init = initialize;