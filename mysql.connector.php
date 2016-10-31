<?php 
namespace MyApp\SqlConnector;

/**
 * SQL Connection Class.
 */
class Mysql
{
    /**
     * @var SELECT_ALL -> select from sql statement.
     */
	const SELECT_ALL = 'SELECT * FROM ';

    /**
     * Constructs Database Connector
     * @param $user
     * @param $pass
     * @param $dbName
     * return void
     */
	function __construct( $user, $pass, $dbName ) {	
			require_once 'meekrodb.2.3.class.php';	

			$this->user = $user;
			$this->pass = $pass;		
			$this->dbName = $dbName;		
	}

	/**
     * Method created to query the database for a user based on user id.
     * @param string $tableName
     *   Name of database table
     * @param string $field
     *   Location of specific field in the database.
     * @param string $value
     *   The value inside the field in the database.
     * @return string
     */
	public function readTableWhereEqual( $tableName, $field, $value ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

        // Executes SQL statement
		$results = \DB::query( self::SELECT_ALL . $tableName . " WHERE " . $field . " = " . $value );

        // Returns result
		return $results;
	}

	/**
     * Method created to display all users from the database using a sql query.
     * @param string $tableName
     * @return string
     */
	public function readTable( $tableName ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

        // Executes SQL statement
		$results = \DB::query( self::SELECT_ALL . $tableName );

        // Returns result.
		return $results;
	}

	/**
     * Creates new user using a sql query.
     * @param string $tableName
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $emailAddress
     * @param string $password
     * @return string
     */
	public function create( $tableName, $firstName, $lastName, $email, $emailAddress, $password ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

        // Executes SQL statement.
		$results = \DB::query( "INSERT INTO " . $tableName . " ( firstName, lastName, email, emailAddress, password ) VALUES ( '" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $emailAddress . "', '" . $password . "' );" );

        // Returns result.
		return \DB::insertId();
	}

	/**
     * Method created to take in data and update it to a user in the database.
     * @param string $tableName
     * @param integer $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $emailAddress
     * @param string $password
     * @return string
     */
	public function update( $tableName, $id, $firstName, $lastName, $email, $emailAddress, $password ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

        // Executes SQL statement
		$results = \DB::query( "UPDATE " . $tableName . " SET firstName = '" . $firstName . "', lastName = '" . $lastName . "', email = '" . $email . "', emailAddress = '" . $emailAddress . "', password = '" . $password . "' WHERE Users.id = " . $id . ";" );

        // Returns result.
		return $results;
	}

	/**
     * Method created to delete a user from the database using a sql query.
     * @param string $tableName
     * @param string $field
     * @param string $value
     * @return string
     */
	public function destroy( $tableName, $field, $value ) {
		
		\DB::$user = $this->user;
		\DB::$password = $this->pass;
		\DB::$dbName = $this->dbName;

        // Executes SQL statement
		$results = \DB::query( "DELETE FROM " . $tableName . " WHERE " . $field . " = " . $value);

        // Returns result.
		return $results;
	}
}
?>