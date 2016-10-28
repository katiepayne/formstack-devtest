<?php
namespace MyApp;

	// Controller file
	require "Controller/UserController.php";

	// Create new instance of UserController.
	$ctrl = new UserController();

	// Create.
	//$result = $ctrl->create(["Jack", "Felldown", "jack.example.com", "jack.example.com", "jill123" ]);

	// Index.
	//$result = $ctrl->index();

	// $ctrl->destroy([6]);

	$result = $ctrl->index();

	echo $result;



?>