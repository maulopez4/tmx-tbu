<?php
session_start();
include('../connect.php');
$a = $_POST['defect_code'];
$b = $_POST['defect_description'];
$c = $_POST['defect_origin'];

// query
$sql = "INSERT INTO defects (defect_code,defect_description,defect_origin)VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: defects.php");
?>