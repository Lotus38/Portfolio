<?php

class DB {
	
	protected $db_name = 'login_db';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';
		
	public function connect() {
	
		$connect_db = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		
		if ($connect_db->connect_errno) {
			echo "Connection failed:";
			exit();
		}
		else echo "Connection Succesful";
		return $connect_db;
	}
}

class signup {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function insertinfo($value1, $value2, $value3, $value4) {
        $sql = "INSERT INTO `namen`(`first_name`, `last_name`, `username`, `password`) VALUES ('$value1','$value2','$value3','$value4')";

        if ($this->con->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
		else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$beginconnectieobject = new DB();
$maakconnectie = $beginconnectieobject->connect();


$naam = $_POST["naam"];
$achternaam = $_POST["achternaam"];
$gebruikersnaam = $_POST["gebruikersnaam"];
$wachtwoord = $_POST["wachtwoord"];

$insertconnectieobject = new signup($maakconnectie);
$insertconnectieobject->insertinfo($naam, $achternaam, $gebruikersnaam, $wachtwoord);