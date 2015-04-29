var $ = require('../util/sprint');

var initialize = function(formSelector) {
	this.$form = $(formSelector);
	this.$required = this.$form.find('[validate-required]');
	this.$email = this.$form.find('[validate-email]');
	this.$submit = this.$form.find('button.submit');
	listen.call(this);
};

var listen = function() {
	var self = this;
	this.$email.on('blur', function(e) {
		validateEmail.call(this, e, self);
	});
	this.$required.on('blur', function(e) {
		validateRequired.call(this, e, self);
	});
	this.$submit.on('click', function(e) {
		validateSubmit.call(this, e, self);
	});
	this.$submit.on('keydown', function(e) {
		if (e.keyCode == 13) validateSubmit.call(this, e, self);
	});
};

var validateEmail = function(e, form) {
	console.log(this, e, form);
};

var validateRequired = function(e, form) {
	console.log(this, e, form);
};

var validateSubmit = function(e, form) {
	e.preventDefault();
	console.log(this, e, form);
	return false;
};

module.exports.init = initialize;