<?php
	include('../connect.php');
?>
<?php
	include('../connect.php');
    $id=$_GET['id'];
    $query="SELECT * FROM paintcodes WHERE paintcode_id= $id";
	$result = $db->prepare($query);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="paintcodes_editsave.php" method="post">
<div id="add_form_title"><i class="icon-edit icon-large"></i> Edit Paint Code</div>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Code : </span><input type="text" name="code" value="<?php echo $row['paintcode_code']; ?>" /><br>
<span>Brand : </span><input type="text" name="brand" value="<?php echo $row['paintcode_brand']; ?>" /><br>
<span>Description : </span><input type="text" name="description" value="<?php echo $row['paintcode_description']; ?>" /><br>

<div style="float:right; margin-right:35px">
    <button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save</button>
    </div>
</div>
</form>
<?php
}
?>