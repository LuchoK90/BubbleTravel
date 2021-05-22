<?php

session_start();
		setcookie(session_name(), '', time() - 42000, '/'); 
		unset( $_SESSION );
		session_destroy();
		header("location: miBubbleTravel.php");

?>