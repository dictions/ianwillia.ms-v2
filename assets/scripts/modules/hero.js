var $ = require('../util/sprint');
var _debounce = require('lodash/function/debounce');

var initialize = function(heroSelector) {
	this.$hero = $(heroSelector);
	this.fresh = this.$hero.html();
	this.destroy = destroy.bind(this);
	listen.call(this);
};

var listen = function() {
	this.$hero.on('click', scramble.bind(this));
};

var destroy = function() {
	this.$hero.off('click');
};

var shuffle = function(string, count) {
	for (var i = 0; i < count; i++) {
		var a = Math.floor(Math.random() * string.length);
		var b = Math.floor(Math.random() * string.length);
		var tempA = string[a];
		var tempB = string[b];
		string = string.substr(0, a) + tempB + string.substr(a + 1);
		string = string.substr(0, b) + tempA + string.substr(b + 1);
	}
	return string;
};

var scramble = function() {
	var self = this;
	var string = this.$hero.html();
	var count = Math.round(string.length * 0.1);
	this.$hero.html(shuffle(string, count));

	if (this.timeout) clearTimeout(this.timeout);
	this.timeout = setTimeout(function() {
		self.$hero.html(self.fresh);
		document.getSelection().empty();
	}, 1000);
};



module.exports = initialize;