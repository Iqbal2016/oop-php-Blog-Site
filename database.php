<?php

class Database {

    private $conn;

    public function __construct($host, $user, $pass, $db) {
        session_start();
        $this->conn = mysqli_connect($host, $user, $pass, $db) or die("Connection Fail" . mysqli_connect_error());
    }

    public function getAll($table, $cols) {
        $sql = "SELECT $cols FROM $table";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function getById($table, $cols, $where) {
        $sql = "SELECT $cols FROM $table WHERE $where";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function getALLMenus($table, $cols, $where) {
        $sql = "SELECT $cols FROM $table WHERE $where";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function Insert($table, $cols) {
        $sql = "INSERT INTO $table SET $cols";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) > 0) {
            return true;
        }
    }

    public function Update($table, $cols, $where) {
        $sql = "UPDATE $table SET $cols WHERE $where";
        //echo $sql;
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) > 0) {
            return true;
        }
    }

    public function Delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) > 0) {
            return true;
        }
    }

    public function Login($table, $cols, $where) {
        $sql = "SELECT $cols FROM $table WHERE $where";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $user['name'];
            return true;
        } else {
            return false;
        }
    }

}

$obj = new Database("localhost", "root", "", "aferiwal_oop");

/*echo "<pre>";
	if($obj->getAll("students","name,email,mobile")!=false){
		print_r($obj->getAll("students","name,email,mobile"));
	}
	else{
		echo "No Data Available";	
	}

echo "</pre>";
*/