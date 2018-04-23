<?php
class Mysql {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;
//CONNECTION
    public function connection($host, $username, $password) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->conn = mysql_connect($this->host, $this->username, $this->password)
                or die("Couldn't connect");
    }
//DATABASE CONNECTION
    public function database($database) {
        $this->database = $database;
        //print_r($this->conn);
        mysql_select_db($this->database, $this->conn) or die("cannot select Database");
    }
}

$connect = new Mysql('localhost', 'root', '');
$connect->connection('localhost', 'root', '');
$connect->database('preeti');
?>
