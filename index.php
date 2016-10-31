<?php
namespace MyApp;

use MyApp\Controller;

    /**
     * Import Controller.
     */
	require_once "Controller/UserController.php";

    /**
     * Instantiate Controller.
     */
	$ctrl = new \MyApp\Controller\UserController();

    // Read User from the database.
    $result = $ctrl->index();

    $items = json_decode( $result );

    echo sizeof( $items );
