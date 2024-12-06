<?php
$errors = [
	'-32700' => [
        'code' 		=> '-32700',
        'message'	=> 'Parse error',
        'meaning'	=> 'Invalid JSON was received by the server. An error occurred on the server while parsing the JSON text.'
	],
	'-32701' => [
        'code' 		=> '-32701',
        'message'	=> 'Data exist',
        'meaning'	=> 'Email/Mobile already exist in our platform.'
	],
	'-32702' => [
        'code' 		=> '-32702',
        'message'	=> 'Verification',
        'meaning'	=> 'Verification code is wrong.'
	],
	'-32703' => [
        'code' 		=> '-32703',
        'message'	=> 'Error',
        'meaning'	=> 'Email is not registred in this platfrom'
	],
	'-32704' => [
        'code' 		=> '-32704',
        'message'	=> 'Error',
        'meaning'	=> 'Required field.'
	],
	'-32705' => [
        'code' 		=> '-32705',
        'message'	=> 'Invalid',
        'meaning'	=> 'Invalid request.'
	],
	'-32706' => [
        'code' 		=> '-32706',
        'message'	=> 'Not Verified,Verify your account.',
        'meaning'	=> 'Your email is not verified.'
	],
	'-32707' => [
        'code' 		=> '-32707',
        'message'	=> 'Account Inactived',
        'meaning'	=> 'Your account is inactived.'
	],
	'-32708' => [
        'code' => '-32708',
        'message'	=> 'Wrong Input',
        'meaning'	=> 'Email or password is wrong.'
	],
	'-32709' => [
        'code' => '-32709',
        'message'	=> 'Wrong Input',
        'meaning'	=> 'Current password is wrong.'
	],
    '-32710' => [
        'code' => '-32710',
        'message'   => 'Wrong Data',
        'meaning'   => 'Property Not Found.'
    ],
    '-32711' => [
        'code' => '-32711',
        'message'   => 'Wrong Data',
        'meaning'   => 'Order Not Found.'
    ],
    '-32712' => [
        'code'      => '-32712',
        "message" => "Verification",
        "meaning" => "A verification code sent to your email.",
    ],
    '-32713' => [
        'code'      => '-32713',
        'message'   => 'Verified',
        'meaning'   => 'Your email is verified.'
    ]
];
if(!defined('ERRORS')) {
	define('ERRORS', $errors);
}

