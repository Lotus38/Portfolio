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
            echo "<br>";
			exit();
		}
		else echo "Connection Succesful";
             echo "<br>";

		return $connect_db;
	}
}

Class Select_Query {
    private $select;
    private $from;
    private $where;
    private $and;
    private $limit;
    private $offset;
    private $orderby;
    private $desc;
    private $groupby;

    public function select(string $parameter){
        $this->select = $parameter;
    }

    public function from($parameter){
        $this->from = $parameter;
    }

    public function where($parameter){
        $this->where = $parameter;
    }

    public function and($parameter){
        $this->and = $parameter;
    }
    public function limit($parameter){
        $this->limit = $parameter;
    }

    public function offset($parameter){
        $this->offset = $parameter;
    }

    public function orderby($parameter){
        $this->orderby = $parameter;
    }

    public function desc($parameter){
        $this->desc = $parameter;
    }

    public function groupby($parameter){
        $this->groupby = $parameter;
    }

    public function make_select_query(){
        $query = "SELECT {$this->select} FROM {$this->from}";

        if(!empty($this->where)){
            $query .= " WHERE {$this->where}";
        }

        if(!empty($this->limit)){
            $query .= " LIMIT {$this->limit}";
            if(!empty($this->offset)){
                $query .= " OFFSET {$this->offset}";
            }
        }

        if(!empty($this->orderby)){
            $query .= " ORDER BY {$this->orderby}";
            // DESC
        }

        if(!empty($this->groupby)){
            $query .= " GROUP BY {$this->groupby}";
        }
    
        $query .= ";";

        return $query;
    }
}

Class Fetch {
    protected $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function fetch($object){
        $sql = $object->make_select_query();
        $result = mysqli_query($this->con, $sql);
        $row = $result->fetch_assoc();
        echo implode(" ",$row);
    }
}

Class Insert_Query {
    protected $insert;
    protected $parameters;
    protected $values;
    protected $con;

    public function __construct($insert, $parameters, $values, $con) {
        $this->insert = $insert;
        $this->parameters = $parameters;
        $this->values = $values;
        $this->con = $con;
    }

    public function make_insert_query(){
            $query = "INSERT INTO {$this->insert}($this->parameters) VALUES ($this->values)";
            echo "<br>" . $query;
        
            if ($this->con->query($query) === TRUE) {
            echo "<br>" . "New record created successfully";
            } 
            else {
                echo "Error: " . $query . "<br>" . $this->con->error;
            }
        }
    }

Class Update_Query {
    protected $tabelnaam;
    protected $set;
    protected $con;
    protected $where2;

    public function __construct($tabelnaam, $set, $con){
        $this->tabelnaam = $tabelnaam;
        $this->set = $set;        
        $this->con = $con;
    }

    public function where2($parameter){
        $this->where2 = $parameter;
    }

    public function make_update_query(){
        $query = "UPDATE {$this->tabelnaam} SET {$this->set}";
        if(!empty($this->where2)){
            $query .= " WHERE {$this->where2}";
        }
        if ($this->con->query($query) === TRUE) {
            echo "<br>" . "Update successful";
            } 
            else {
                echo "Error: " . $query . "<br>" . $this->con->error;
            }
    }
}

Class Delete_Query{
    protected $tabelnaam;
    protected $where;
    protected $con;

    public function __construct($tabelnaam, $where, $con){
        $this->tabelnaam = $tabelnaam;
        $this->where = $where;        
        $this->con = $con;
    }

    public function make_delete_query(){
        $sql = "DELETE FROM {$this->tabelnaam} WHERE {$this->where}";
        if ($this->con->query($sql) === TRUE) {
            echo "<br>" . "Successfully deleted";
            } 
            else {
                echo "Error: " . $query . "<br>" . $this->con->error;
            }
    }
}

Class variabele {
    protected $variabele;

    public function __construct($variabele){
        $this->variabele = $variabele;
    }

    public function get_variabele(){
        return $this->variabele;
    }
}

$connection = new DB();
$connectie = $connection->connect();

$kolom1 = new variabele("`first_name`");
$DB = new variabele("`namen`");
$vanwaar = new variabele("`username` = 'kv'");
$query1 = new Select_Query();
$query1->select($kolom1->get_variabele());
$query1->from($DB->get_variabele());
$query1->where($vanwaar->get_variabele());
$query1->make_select_query();
echo $query1->make_select_query() . "<br>";
$fetch = new Fetch($connectie);
$fetch->fetch($query1);

$dbparameters = "`first_name`, `last_name`, `username`, `password`";
$valuesstring = "'Friet', 'Patat', 'prietje', 'wachtwoord'";
$insertquery = new Insert_Query($DB->get_variabele(), $dbparameters, $valuesstring, $connectie);
$insertquery->make_insert_query();

$setje = "`last_name`='Nooit'";
$update = new Update_Query($DB->get_variabele(), $setje, $connectie);
$update->where2($vanwaar->get_variabele());
$update->make_update_query();

$tabnaam = "`namen`";
$dewaar = "`mem_id` = 11";
$delete = new Delete_Query($tabnaam, $dewaar, $connectie);
$delete->make_delete_query();