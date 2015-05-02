var $ = require('../util/sprint');
var request = require('superagent');

var initialize = function(formSelector) {
	this.$form = $(formSelector);
	this.$required = this.$form.find('[validate-required]');
	this.$email = this.$form.find('[validate-email]');
	this.$textarea = this.$form.find('textarea');
	this.$submit = this.$form.find('button.submit');
	this.$error = this.$form.find('.error');
	this.$alert = this.$form.find('.alert');
	listen.call(this);
};

var listen = function() {
	var self = this;
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
	this.$alert.on('click', function(e) {
		$(this).removeClass('show');
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

    return re.test(val);
};

var validateRequired = function(e, form) {
	var $input = $(this);
	var $error = $input.siblings('.error');
	var val = $input.val();
	if (val.length == 0) showError.call($error, $error.attr('data-required'))
	return (val.length > 0)
};

var validateAll = function() {
	var valid = true;
	this.$email.each(function($e) {
		if (!validateEmail.call(this)) valid = false;
	});
	this.$required.each(function($r) {
		if (!validateRequired.call(this)) valid = false;
	});
	return valid;
};

var showError = function(error) {
	this.addClass('show').html(error);
};

var listenOnBlur = function() {
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
}

var validateSubmit = function(e, form) {
	e.preventDefault();

	if (validateAll.call(form)) {
		var $form = $(form);
		console.log($('[name="fullname"]').val());
		request.post('/form')
		.send({
			"fullname": $('[name="fullname"]').val(),
			"email": $('[name="email"]').val(),
			"timeline": $('[name="timeline"]').val(),
			"budget": $('[name="budget"]').val(),
			"message": $('[name="message"]').val()
		})
		.end(function(err, res) {
			res.body.success ? showFormSuccess.call(form) : showFormError.call(form)
		});
	} else {
		// Only listen on blur when you've fucked up the form
		listenOnBlur.call(form);
	}

	return false;
};

var clearForm = function() {
	this.$form.dom[0].reset();
}

var showFormSuccess = function() {
	this.$alert.find('span').html('Thanks for dropping a line :)');
	this.$alert.addClass('show');
	clearForm.call(this);
};

var showFormError = function() {
	this.$alert.find('span').html('There has been an error :( \n Try refreshing your browser. Also, you can always email me at <a style="color:white;" href="mailto:me@ianwillia.ms">me@ianwillia.ms</a>');
	this.$alert.addClass('show');
	clearForm.call(this);
};

module.exports.init = initialize;