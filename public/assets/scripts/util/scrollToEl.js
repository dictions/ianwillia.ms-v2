var $ = require('./sprint');
var Velocity = require('velocity-animate');
var noop = function() {};

module.exports = function(selector, cb) {
	var el = $(selector).dom[0];
	Velocity(el, 'scroll', {
		easing: [.8,0,.2,1],
		duration: 800,
		complete: (typeof cb === 'function') ? cb : noop
	});
};