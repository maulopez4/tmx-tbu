<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM users WHERE user_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>