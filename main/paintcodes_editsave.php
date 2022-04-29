<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];
$b = $_POST['brand'];
$c = $_POST['description'];

// query
$query = "UPDATE paintcodes SET paintcode_code=?, paintcode_brand=?, paintcode_description=? WHERE paintcode_id=?";
$sql = $db->prepare($query);
$sql->execute(array($a,$b,$c,$id));
header("location: paintcodes.php");
?>