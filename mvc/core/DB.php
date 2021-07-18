<?php 
    class DB{
        public $con;
        protected $servername = "db";
        public $username = "root";
        public $password = "example";
        public $dbname = "htht";

        function __construct(){
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }
    }
?>