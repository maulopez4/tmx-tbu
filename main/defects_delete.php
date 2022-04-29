<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM defects WHERE user_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>