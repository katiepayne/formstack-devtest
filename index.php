<?php
namespace MyApp;

	// Controller file
	require "Controller/UserController.php";

	// Create new instance of UserController.
	$ctrl = new UserController();

	// Runs Application 
	echo $ctrl->destroy([2]);
?>