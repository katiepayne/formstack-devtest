<?php  
namespace MyApp\Controller;

use MyApp\SqlConnector;
use MyApp\Model;

/**
 * UserController class.
 */
class UserController
{
    /**
     * @var $db = database.
     */
	private $db;

    /**
     * @var TABLE = user table name.
     */
    const TABLE = "Users";

    /**
     * Constructs database connector
     * @param none
     * return void
     */
	public function __construct()
	{
        require_once __DIR__ . '/../mysql.connector.php';

		$this->db = new \MyApp\SqlConnector\Mysql( "my_app", "secret", "my_app" );
	}

    /**
     * Returns the json for a single user
     * @param array $args
     * @return array
     */
	public function show(array $args = array()){

		$id = $args[0];

        // returns single user in json.
		return json_encode(
			$this->db->readTableWhereEqual( self::TABLE, "id", $id)
		);
	}

	/**
     * This method creates a new user in the database.
     * @param array $args
     * @return array
     */
	public function create(array $args = array()){
		$firstName = $args[0];
		$lastName = $args[1];
		$email = $args[2];
		$emailAddress = $args[3];
		$password = $args[4];

        // Returns json for the new user created.
	    return $this->db->create( self::TABLE, $firstName, $lastName, $email, $emailAddress, $password);


	}

	/**
     * This method returns the json for all users in the database.
     * @param none
     * @return void
     */
	public function index(){

        // Returns json containing all Users.
		return json_encode( $this->db->readTable( self::TABLE ) );
	}

    /**
     * This method updates a single user in the database.
     * @param array $args
     * @return array
     */
	public function update(array $args = array()){

		$id = $args[0];
	    $firstName = $args[1];
		$lastName = $args[2];
		$email = $args[3];
		$emailAddress = $args[4];
		$password = $args[5];

        // Returns json of updated user with the given data.
	    return json_encode(
			$this->db->update( self::TABLE, $id, $firstName, $lastName, $email, $emailAddress, $password )
		);
	}

	/**
     * This method deletes a user from the database via user id.
     * @param array $args
     * @return array
     */
	public function destroy(array $args = array()){

	    $id = $args[0];

        // Returns true when user is deleted.
		return json_encode(
			$this->db->destroy( self::TABLE, "id", $id)
		);
	}	
}
