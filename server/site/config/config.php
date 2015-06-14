<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('environment', 'production');


/*

---------------------------------------
Routing Configuration
---------------------------------------

*/

c::set('routes', array(
	array(
		'pattern' => 'form',
		'method' => 'POST',
		'action'  => function() {

			// Receive JSON from SuperAgent not form action
			$post = json_decode(file_get_contents('php://input'), true);

			$alert = null;

			$data = array(
				'name'      => $post['fullname'],
				'email'     => $post['email'],
				'timeline'  => $post['timeline'],
				'budget'    => $post['budget'],
				'message'   => $post['message'],
			);

			// Validate server side, the ugly way
			// EVERYTHING IS FUCKING REQUIRED
			if (!!!$post['fullname'] || !!!$post['email'] || !!!$post['timeline'] || !!!$post['budget'] || !!!$post['message']) {
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
				'from'    => 'contact@ianwillia.ms',
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

			//raheader('Content-Type: application/json');
			return response::json($alert);

		}
	),
	array(
		'pattern' => 'work',
		'action'  => function() {
			go('/#work');
		}
	)
));