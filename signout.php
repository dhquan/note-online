<?php 
	require 'core/init.php';
	$session->destroy();
	header("location:index.php");

?>