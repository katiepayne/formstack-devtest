<?php

namespace MyApp\Test;

class MysqlConnectorTests extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        // Controller file
        require_once "/MyApp/Controller/UserController.php";

        // Create new instance of UserController.
        $this->ctrl = new UserController();
    }


    public function assertUserCreated()
    {
        // Runs Application
        $result = $this->ctrl->create(["Jack", "Felldown", "jack.example.com", "jack.example.com", "jill123" ]);

        // Assert
        $this->assertEquals($result, "true");
    }
}