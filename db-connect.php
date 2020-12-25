<?php
/* Database connection information */
$npdms['user'] = "nattanin";
$npdms['password'] = "Np721220$";
$npdms['dbname'] = "npdms";
$npdms['server'] = "localhost";

/* Database connection */
$npdms['db'] = new mysqli($npdms['server'], $npdms['user'], $npdms['password'], $npdms['dbname']);

/* Database connection error_reporting */
if ($npdms['db']->connect_error) {die("Connection failed: " . aSql['db']->connect_error);}

/* Config Database to use UTF-8 */
$npdms['db']->set_charset("utf8");

?>


