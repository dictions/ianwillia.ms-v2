<?php

return function($site, $pages, $page) {

	$alert = null;

	$data = array(
		'name'      => $_POST['fullname'],
		'email'     => $_POST['email'],
		'timeline'  => $_POST['timeline'],
		'budget'    => $_POST['budget'],
		'message'   => $_POST['message'],
	);

	// Validate server side, the ugly way
	// EVERYTHING IS FUCKING REQUIRED
	if (!!!$_POST['fullname'] || !!!$_POST['email'] || !!!$_POST['timeline'] || !!!$_POST['budget'] || !!!$_POST['message']) {
		$alert = array(
			'success' => false,
			'data' => $data
		);
		return compact('alert');
	}

	// create the body from a simple snippet
	$body  = snippet('contact-message', $data, true);

	// build the email
	$email = email(array(
		'to'      => 'me@ianwillia.ms',
		'from'    => 'FORM@ianwillia.ms',
		'subject' => 'WORK REQUEST',
		'replyTo' => $data['email'],
		'body'    => $body
	));

	// try to send it and redirect to the
	// thank you page if it worked
	if($email->send()) {
		$alert = array(
			'success' => true,
			'data' => $data
		);
	} else {
		$alert = array(
			'success' => false,
			'data' => $data
		);
	}

	return compact('alert');

};