<?php
/**
* Model class
*/
class Model {

	public $db;

	public function __construct() {

		// Global Variables
		global $servername, $username, $password, $database;

		// Create connection
		$this->db = new mysqli($servername, $username, $password);

		// Check connection
		if ($this->db->connect_errno) {
		    die("Connection failed: (" . $this->db->connect_errno . ") " . $this->db->connect_error);
		}

		// Create database
		if (!($this->db->query("CREATE DATABASE IF NOT EXISTS $database"))) {
		    die("Error creating database: " . $this->db->error);
		}

		// Create new connection
		$this->db = new mysqli($servername, $username, $password, $database);

		// Check Payroll table
		if (!($this->db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'payroll'")->num_rows)) {
			$this->db->query("CREATE TABLE `payroll` (
																								worker VARCHAR(255) NOT NULL,
																								department VARCHAR(255) NOT NULL,
																								amount SMALLINT(6),
																								salary SMALLINT(6)
			);");
		}

	}


}