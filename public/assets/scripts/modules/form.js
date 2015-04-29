var $ = require('../util/sprint');

var initialize = function(formSelector) {
	this.$form = $(formSelector);
	this.$required = this.$form.find('[validate-required]');
	this.$email = this.$form.find('[validate-email]');
	this.$textarea = this.$form.find('textarea');
	this.$submit = this.$form.find('button.submit');
	this.$error = this.$form.find('.error');
	listen.call(this);
};

var listen = function() {
	var self = this;
	this.$email.on('blur', function(e) {
		validateEmail.call(this, e, self);
	});
	this.$email.on('focus', function(e) {
		$(this).siblings('.error').removeClass('show');
	});
	this.$required.on('blur', function(e) {
		validateRequired.call(this, e, self);
	});
	this.$required.on('focus', function(e) {
		$(this).siblings('.error').removeClass('show');
	});
	this.$textarea.on('input propertychange keyup change', function() {
		var el = $(this).dom[0];
		el.style.height = 0;
		el.style.height = el.scrollHeight + "px";
	});
	this.$submit.on('click', function(e) {
		validateSubmit.call(this, e, self);
	});
	this.$submit.on('keydown', function(e) {
		if (e.keyCode == 13) validateSubmit.call(this, e, self);
	});
	this.$error.on('click', function(e) {
		$(this).removeClass('show');
		$(this).siblings('.input').first().dom[0].select();
	});
};

var validateEmail = function(e, form) {
	var $input = $(this);
	var $error = $input.siblings('.error');
	var val = $input.val();
	if (val.length == 0) {
		return validateRequired.call(this, e, form);
	}

	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!re.test(val)) {
    	showError.call($error, $error.attr('data-email'))	
    }
};

var validateRequired = function(e, form) {
	var $input = $(this);
	var $error = $input.siblings('.error');
	var val = $input.val();
	if (val.length == 0) showError.call($error, $error.attr('data-required'))
};

var validateSubmit = function(e, form) {
	e.preventDefault();
	console.log(this, e, form);
	return false;
};

var showError = function(error) {
	console.log(error);
	this.addClass('show').html(error);
}

module.exports.init = initialize;