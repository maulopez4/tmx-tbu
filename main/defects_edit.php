<?php
	include('../connect.php');
?>
<?php
    $id=$_GET['id'];
    $query="SELECT * FROM defects WHERE defect_id= $id";
	$result = $db->prepare($query);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="users_editsave.php" method="post">
<div id="add_form_title"><i class="icon-edit icon-large"></i> Edit Defect Definition</div>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Defect Code : </span><input type="text"  name="full_name" value="<?php echo $row['defect_code']; ?>" /><br>
<span>Defect Description : </span><input type="text"  name="number" value="<?php echo $row['defect_description']; ?>" /><br>
<span>Defect Origin : </span>
<?php 
        $query="SELECT DISTINCT(defect_origin_origin) FROM defect_origins";
        $sql=$db->prepare($query);
        $sql->execute();
        $defect_origins = $sql->fetchAll();
    ?>
<select name="defect_origin"> 
	<option selected ="<?php echo $row["defect_origin"]; ?>" value = "<?php echo $row["defect_origin"]; ?>"><?php echo $row["defect_origin"]; ?></option>           
    <?php foreach($defect_origins as $defect_origin): ?>
        <option value="<?php echo $defect_origin["defect_origin_origin"]; ?>"> <?php $defect_origins["defect_origin_origin"]; ?></option>
    <?php endforeach; ?>
</select><br>
<div style="float:right; margin-right:35px">
<button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>