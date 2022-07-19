<?php 
    class dbconnect{
        public $con;
        protected $servername ="localhost";
        protected $username ="root";
        protected $password = "";
        protected $dbname ="khoaluantotnghiep";

        function __construct(){
            $this -> con = mysqli_connect($this->servername, $this->username, $this-> password);
            mysqli_select_db($this->con, $this -> dbname);
            mysqli_query($this->con,"SET_NAMES 'utf8");
        }
    }
?>