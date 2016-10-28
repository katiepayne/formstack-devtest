<?php 
namespace MyApp;
  
class Mysql { 
	const SELECT_ALL = 'SELECT * FROM ';
    
	function __construct( $user, $pass, $dbName ) {	
			require_once 'meekrodb.2.3.class.php';	

			$this->user = $user;
			$this->pass = $pass;		
			$this->dbName = $dbName;		
	}

	/**
     * Method created to display single user from the database using a sql query.
     */
	public function readTableWhereEqual( $tableName, $field, $value ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;
		$results = \DB::query( self::SELECT_ALL . $tableName . " WHERE " . $field . " = " . $value );

		return $results;
	}

	/**
     * Method created to display all users from the database using a sql query.
     */
	public function readTable( $tableName ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;
		$results = \DB::query( self::SELECT_ALL . $tableName );

		return $results;
	}

	/**
     * Creates new user using a sql query. 
     */
	public function create( $tableName, $firstName, $lastName, $email, $emailAddress, $password ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

		$results = \DB::query( "INSERT INTO " . $tableName . " ( firstName, lastName, email, emailAddress, password ) VALUES ( '" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $emailAddress . "', '" . $password . "' );" );

		return $results;
	}

	/**
     * Method created to update a single user 
     */
	public function update( $tableName, $id, $firstName, $lastName, $email, $emailAddress, $password ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

		$results = \DB::query( "UPDATE " . $tableName . " SET firstName = '" . $firstName . "', lastName = '" . $lastName . "', email = '" . $email . "', emailAddress = '" . $emailAddress . "', password = '" . $password . "' WHERE Users.id = " . $id . ";" );

		return $results;
	}

	/**
     * Method created to delete a user from the database using a sql query.
     */
	public function destroy( $tableName, $field, $value ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;
		$results = \DB::query( "DELETE FROM " . $tableName . " WHERE " . $field . " = " . $value);

		return $results;
	}


}
?>