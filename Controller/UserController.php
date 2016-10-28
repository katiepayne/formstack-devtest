<?php  
namespace MyApp;


class UserController {

	private $db;

	const TABLE = "Users";

	public function __construct()
	{
		require 'mysql.connector.php';

		$this->db = new Mysql( "my_app", "secret", "my_app" );
	}

    /**
     * Returns the json for a single user
     */
	public function show(array $args = array()){

		// todo extract the id to get from the args
		$id = $args[0]; //UPDATE 0 with the proper index value

	    //The function logic will be here.
		return json_encode( 
			$this->db->readTableWhereEqual( self::TABLE, "id", $id)
		);
	}

	/**
     * This method creates a new User in the database.
     */
	public function create(array $args = array()){
		$firstName = $args[0];
		$lastName = $args[1];
		$email = $args[2];
		$emailAddress = $args[3];
		$password = $args[4];

	    //The function logic will be here.
	    return json_encode( 
			$this->db->create( self::TABLE, $firstName, $lastName, $email, $emailAddress, $password )
		);
	}

	/**
     * This method returns the json for all users in the database. 
     */
	public function index(){

		return json_encode( $this->db->readTable( self::TABLE ) );
	}

    /**
     * This method updates a single user to the database. 
     */
	public function update(array $args = array()){

		$id = $args[0];

	    //The function logic will be here.
	    $firstName = $args[1];
		$lastName = $args[2];
		$email = $args[3];
		$emailAddress = $args[4];
		$password = $args[5];

	    //The function logic will be here.
	    return json_encode( 
			$this->db->update( self::TABLE, $id, $firstName, $lastName, $email, $emailAddress, $password )
		);
	}

	// delete user
	/**
     * This method deletes a user from the database via user id. 
     */
	public function destroy(array $args = array()){

	    //The function logic will be here.
	    $id = $args[0]; //UPDATE 0 with the proper index value

	    //The function logic will be here.
		return json_encode( 
			$this->db->destroy( self::TABLE, "id", $id)
		);
	}	
}
