<?php

namespace MyApp\Model;

/**
 * User model class.
 */
class User {

   /**
    * {Integer} Unique Identifier of the user.
    */
    public $id;

   /**
    * {String} First name of the user.
    */
    public $firstName;

   /**
    * {String} Last name of the user.
    */
	public $lastName;

   /**
    * {String} User's email address.
    */
	public $email;

   /**
    * {String} Added duplicate email address to meet assignment specifications .
    */
	public $emailAddress;

   /**
    * {string} User's password.
    */
	public $password;
}