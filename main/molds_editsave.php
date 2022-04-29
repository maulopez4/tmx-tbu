<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['full_name'];
$b = $_POST['number'];
$c = $_POST['username'];
$d = $_POST['password'];
$e = $_POST['email'];
$f = $_POST['user_role'];
$g = $_POST['location'];
$h = $_POST['user_team'];
$i = $_POST['notes'];
// query
$query = "UPDATE Molds SET user_full_name=?, user_employee_number=?, user_username=?, user_password=?, user_email=?, user_role=?, user_location=?, user_team=?, user_notes=? WHERE user_id=?";
$sql = $db->prepare($query);
$sql->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$id));
header("location: Molds.php");
?>