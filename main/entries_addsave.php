<?php
session_start();
include('../connect.php');
$a = $_POST['full_name'];
$b = $_POST['number'];
$c = $_POST['username'];
$d = $_POST['password'];
$e = $_POST['email'];
$f = $_POST['user_role'];
$g = $_POST['location'];
$h = $_POST['team'];
$i = $_POST['notes'];
// query
$sql = "INSERT INTO CHANGE_THIS (user_full_name,user_employee_number,user_username,user_password,user_email,user_role,user_location,user_team,user_notes)VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i));
header("location: CHANGE_THIS.php");
?>