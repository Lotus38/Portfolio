<?php

class DB {
	
	protected $db_name = 'login_db';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = '127.0.0.1';

    public $con = NULL;

    public function __construct(){
        $this->con = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if($this->con->connect_error){
            echo "Fail" . $this->con->connect_error;
        }
        else echo "Connection Succesful";
    }
}

$test = new DB();

echo '<pre>';
print_r($test);
echo '</pre>';