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

class login {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function checkuserww($gebruikersnaam, $wachtwoord) {
        $sql = "SELECT * FROM `namen` WHERE `username` = '$gebruikersnaam'";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
              
                if (password_verify($wachtwoord, $row["password"])) {
                    echo $row["first_name"] . " " . $row["last_name"];
                } else {
                    echo "Onjuiste combinatie 1";
                }
            }
        } else {
            return "Onjuiste combinatie 2";
        }
    }
}

$test = new DB();
$connectie = $test->connect();

$naam = $_POST["name"];
$ww = $_POST["ww"];

$login = new login($connectie);
$login->checkuserww($naam, $ww);