<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM workorders WHERE workorder_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>