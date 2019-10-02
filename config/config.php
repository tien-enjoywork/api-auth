<?php

/*
 * You can place your custom package configuration in here.
 */
return [
	'routes' => [
		'register' => '/api/v1/register',
		'login' => '/api/v1/login',
		'password' => [
			'email' => '/api/v1/password/email',
			'reset' => '/api/v1/password/reset',
		]
	],
	'notify' => [
		'send_link_reset_password' => false,
		'send_success_email_reset_password' => false
	]
];