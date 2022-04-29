<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM molds WHERE mold_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>