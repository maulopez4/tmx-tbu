<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM CHANGE_THIS WHERE CHANGE_THIS_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>