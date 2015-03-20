<?php
	/**
	* User Class
	*/
	class User 
	{
		
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_email;
		private $user_password;
		private $birthdate;

		function __construct($user_id, $first_name, $last_name, $user_email, $user_password, $birthdate)
		{
			$this->user_id = $user_id;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->user_email = $user_email;
			$this->user_password = $user_password;
			$this->birthdate = $birthdate;
		}

		function getUserId() {
			return $this->user_id;
		}

		function getFirstName() {
			return $this->first_name;
		}

		function getLastName() {
			return $this->last_name;
		}

		function getUserEmail() {
			return $this->user_email;
		}

		function getPassword() {
			return $this->user_password;
		}

		function getBirthdate() {
			return $this->birthdate;
		}


	}





?>