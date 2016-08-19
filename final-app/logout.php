<?php
	require("configuration.php");
	session_unset();/*unset($_session['user'])*/
	session_destroy();
	header("Location: login.php");
    die("Redirecting to login.php"); 
?>