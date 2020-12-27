<?php
/*
* Script: DataTables server-side script for PHP and MySQL
* Copyright: 2010 - Allan Jardine, 2012 - Chris Wright
* License: GPL v2 or BSD (3-point)
* Modify to OOP by Nattanin Peancharoen :2020
*/

/* OOP Declare class */
define('DB_Srv','localhost'); //hostname
define('DB_Usr','root'); //Databae User
define('DB_Psw','Np721220$'); //Database password
define('DB_Nam','npdms'); // Database Name
define('DB_Che','UTF-8'); // Database Charset
class DB_con {
    function __construct() {
        $conn = new mysqli(DB_Srv, DB_Usr, DB_Psw, DB_Nam);
            
        if ($conn->connect_error){
            die('Connect Error (' . $conn->connect_errno . ') '. $conn->connect_error);
        } else {
            $conn->set_charset("utf8"); //Set Charset
               }
        //$this->dbcon = $conn;
    }
    public function registration($fnam, $lnam, $ueml, $upwd) {
        $sql = "INSERT INTO lcp3_users(firstname, lastname, email, password)
                VALUES('$fnam','$lnam','$ueml','$upwd')";
        $reg = $conn->query($sql);
        return $reg;
    }  
    public function emailavailable($ueml) {
        $checkemail = $conn->query("SELECT email FROM lcp3_users WHERE email='$ueml'");
        return $checkemail;
    }  
}

