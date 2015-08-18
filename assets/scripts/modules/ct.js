var $ = require('../util/sprint');
var _debounce = require('lodash/function/debounce');

var initialize = function(ctSelector) {
	this.destroy = destroy.bind(this);
	this.$ct = $(ctSelector);
	this.$image = this.$ct.find('img');
	this.$thumb = this.$ct.find('[range-thumb]');
	this.$track = this.$ct.find('[range-track]');
	this.rangeActive = false;
	this.rangePosition = 0;
	this.$image.attr('src', this.$image.attr('ct-src'));
	setPosition.call(this);
	listen.call(this);
	animate.call(this);
};

var listen = function() {
	this.$ct.on('mousedown', rangeActive.bind(this));
	this.$ct.on('mouseup', rangeInactive.bind(this));
	this.$ct.on('touchstart', rangeActive.bind(this));
	this.$ct.on('touchend', rangeInactive.bind(this));
};

var destroy = function() {
	this.$ct.off('mousedown');
	this.$ct.off('mouseup');
	this.$ct.off('touchstart');
	this.$ct.off('touchend');
};

var rangeActive = function(e) {
	var self = this;
	this.rangeActive = true;
	this.animating = false;
	clearInterval(this.animationInterval);


	var rangeLeft = e.currentTarget.getBoundingClientRect().left;
	var rangeWidth = e.currentTarget.offsetWidth;

	var deactivateSlider = function(e) {
		self.rangeActive = false;
		document.removeEventListener('mouseup', deactivateSlider);
		document.removeEventListener('mousemove', dragSlider);
		document.removeEventListener('touchend', deactivateSlider);
		document.removeEventListener('touchmove', dragSlider);


		// animate again ;)
		setTimeout(function() { animate.call(self); }, 1000);
	};

	var dragSlider = function(e) {
		if (self.rangeActive && e.pageX >= rangeLeft && e.pageX <= (rangeLeft + rangeWidth)) {
			self.rangePosition = Math.round(((e.pageX - rangeLeft) / rangeWidth) * 60);
			setPosition.call(self);
			setImage.call(self);
		}
	};

	dragSlider(e);

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
	this.$thumb.attr('data-content', (this.rangePosition * 3) + 'DEG' + (this.rangePosition * 3).toString(2));
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

var animate = function() {
	var self = this;
	this.animating = true;

	this.animationInterval = setInterval(function() {
		if (self.animating) {
			if (self.rangePosition >= 60) {
				self.rangePosition = 0;
			} else {
				self.rangePosition += 1;
				setPosition.call(self);
				setImage.call(self);
			}
		}
	}, 1000 / 20);

};

module.exports = initialize;