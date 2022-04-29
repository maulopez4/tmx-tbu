<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['brand'];
$c = $_POST['description'];
// query
$sql = "INSERT INTO paintcodes (paintcode_code,paintcode_brand,paintcode_description)VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: paintcodes.php");
?>