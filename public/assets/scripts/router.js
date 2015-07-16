var $ = require('./util/sprint');
var request = require('superagent');
var scrollToEl = require('./util/scrollToEl');
var Velocity = require('velocity-animate');

var prepLink = function(href) {
	var parser = document.createElement('a');
	parser.href = href;

	return {
		href: href,
		internal: (parser.protocol != 'tel:' && parser.protocol != 'mailto:' && parser.hostname == location.hostname),
		hash: parser.hash || null,
		onThisPage: !!parser.hash && $(parser.hash).dom.length > 0,
	};
};

var linkHandler = function(e) {
	e.preventDefault();

	var link = prepLink(e.currentTarget.href);

	if (!link.internal) return true;
	if (link.internal && !link.hash) return this.goToPage(link);
	if (link.onThisPage) return this.goToHash(link);

	return false;
};

var Router = function(opts) {
	this.linkHandler = linkHandler.bind(this);
	this.onPageChange = opts.onPageChange || function() {};
	this.init();
};

Router.prototype.init = function() {
	this.hijackLinks();
};

Router.prototype.hijackLinks = function() {
	$('a[href]').on('click', this.linkHandler);
};

Router.prototype.unloadLinks = function() {
	$('a[href]').off('click', this.linkHandler);
};

Router.prototype.pushState = function(href) {
	var history = window.history;
	if (history && history.pushState) {
		history.pushState(null, null, href);
	} else {
		window.location = href;
	}
};

Router.prototype.goToPage = function(link) {

	this.pushState(link.href);
	this.unloadLinks();

	var self = this;
	var content = request.get(link.href);

	if (window.scrollY > 20) {
		scrollToEl('main', function() {
			content.end(function(err, res) {
				if (err) return console.log(err);
				var content = /<main\s*[^>]*>([\S\s]*?)<\/main>/im.exec(res.text)[0];
				self.replaceContent(content);
			});
		});
	} else {
		content.end(function(err, res) {
			if (err) return console.log(err);
			var content = /<main\s*[^>]*>([\S\s]*?)<\/main>/im.exec(res.text)[0];
			self.replaceContent(content);
		});
	}

	
};

Router.prototype.goToHash = function(link) {
	this.pushState(link.href);
	scrollToEl(link.hash);
};

Router.prototype.replaceContent = function(content) {
	var $main = $('main');
	var self = this;
	Velocity($main.dom[0], {opacity: 0}, {
		duration: 400,
		easing: [.8,0,.2,1],
		complete: function() {
			$main.html(content);

			Velocity($main.dom[0], {opacity: 1}, {
				duration: 400,
				easing: [.8,0,.2,1]
			});

			self.hijackLinks();
			self.onPageChange();
		}
	});
};

module.exports = Router;