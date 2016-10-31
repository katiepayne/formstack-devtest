<?php
namespace MyApp\Test;

/**
 * Class extends PHPUnit framework, allowing our application to run PHPUnit
 */
class MysqlConnectorTests extends \PHPUnit_Framework_TestCase
{
    /**
     * Method created to display all users from the database using a sql query.
     * @param none
     * @return true if user was created.
     * @test
     */
    public function assertUserCreated()
    {
        // Controller file
        require_once "../Controller/UserController.php";

        // Create new instance of UserController.
        $ctrl = new \MyApp\Controller\UserController();

        // Create user.
        $result = json_decode( $ctrl->create(["Jack", "Felldown", "jack.example.com", "jack.example.com", "jill123"]));

        // Assert user was created in database with given data.
        $this->assertTrue( $result > 0 );
    }

    /**
     * Method created to display a specific user based on id from the database using a sql query.
     * @param none
     * @return true if User was read from database.
     * @test
     */
    public function assertUserShow()
    {
        // Create new instance of UserController.
        $ctrl = new \MyApp\Controller\UserController();

        // Creating a new user, storing it in $newId variable.
        $newId = $ctrl->create(["Jason", "Smith", "jason@example.com", "jason@example.com", "jason123"]);

        // Read user from the database.
        $result = json_decode($ctrl->show([$newId]))[0];

        // Assert method returns correct data for user based on id.
        $this->assertEquals($result->firstName, "Jason");
    }

    /**
     * Method created to display all Users from the database using a sql query.
     * @param none
     * @return true if all Users was read from database.
     * @test
     */
    public function assertShowAllUsers()
    {
        // Create new instance of UserController.
        $ctrl = new \MyApp\Controller\UserController();

        $result = $ctrl->index();

        // Read user from database, storing it in $items variable.
        $items = json_decode( $result );

        // Assert method returns true if all users are read from the database.
        $this->assertTrue(sizeof( $items ) > 1 ) ;
    }

    /**
     * Method created to take in data and update it to a user in the database.
     * @param none
     * @return true if User updated with correct data.
     * @test
     */
    public function assertUserUpdated()
    {
        // Create new instance of UserController.
        $ctrl = new \MyApp\Controller\UserController();

        // Updates user in database
        $result = json_decode($ctrl->update([0, "John", "Jacobson", "john.example.com", "john.example.com", "jon123" ]));

        // Assert user was updated with appropriate data using the given id.
        $this->assertTrue($result, "true");
    }

    /**
     * Method created to delete a user from the database based on given id.
     * @param none
     * @return true if user was properly deleted.
     * @test
     */
    public function assertUserDestroyed()
    {
        // Create new instance of UserController.
        $ctrl = new \MyApp\Controller\UserController();

        // Deletes user from the database.
        $result = json_decode($ctrl->destroy([0]));

        // Assert true if user was deleted based on the given id.
        $this->assertTrue($result, "true");
    }
}