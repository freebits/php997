<?php
function authentication_required() {
	session_start();
	if(empty($_SESSION['auth'])) {
		header('HTTP/1.1 401 Unauthorized');
	}
}

function authenticate() {
	session_start();
	$_SESSION['auth'] = TRUE;
}

function unauthenticate() {
	session_start();
	unset($_SESSION['auth']);
}

function generate_password($length = 32) {
	$keyspace = 
		'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`1234567890-=~!@#$%^&*()_+[]{};:,.<>/?';
	$keyspace_size = strlen($keyspace);
	$password = '';
	for(i = 0; i < $keyspace_size; i++) {
		$password .= $keyspace[random_int(0, $keyspace_size)];
	}	
	return $password;
}
?>
