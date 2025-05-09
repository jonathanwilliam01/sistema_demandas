<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd   = "usuarios";

$mysqli = new mysqli($host, $user, $pass, $bd);

if ($mysqli -> connect_errno) {
	echo "connect failed: " . $mysqli -> connect_error;
	exit ();
}

?>