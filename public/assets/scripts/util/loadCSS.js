var request = require('superagent');

var load = function(url, cb) {
	request.get(url)
	.end(function(err, res) {
		if (!err && cb) {
			cb(res.text);
		} else {
			console.warn(err);
		}
	});
};

var inject = function(styles) {
	s = document.createElement('style');
	sc = document.getElementsByTagName('script')[0];
	sc.parentNode.insertBefore(s, sc);
	s.innerHTML = styles;
}

module.exports = {
	load: load,
	inject: inject
};