<?php
/* Database config*/
$db_host		= 'localhost';
$db_user		= 'tmx-tbu';
$db_pass		= 'Tagmx2021!';
$db_database	= 'tmx-tbu'; 

//Connect to mysql server
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
if(!$conn) {
             die("Failed to connect to server").mysqli_connect_error();
	        }
try {
    $options = array(
        //For updates where newvalue = oldvalue PDOStatement::rowCount()   returns zero. You can use this:
        PDO::MYSQL_ATTR_FOUND_ROWS => true
    );
    $db = new PDO("mysql:host={$db_host}; dbname={$db_database}", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}