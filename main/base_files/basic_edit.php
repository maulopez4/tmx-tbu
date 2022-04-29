<?php
	include('../connect.php');
?>
<?php
	include('../connect.php');
    $id=$_GET['id'];
    $query="SELECT * FROM CHANGE_THIS WHERE CHANGE_THIS_id= $id";
	$result = $db->prepare($query);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="CHANGE_THIS_editsave.php" method="post">
<div id="add_form_title"><i class="icon-edit icon-large"></i> Edit User</div>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Full Name : </span><input type="text" name="full_name" value="<?php echo $row['CHANGE_THIS_full_name']; ?>" /><br>
<span>Employee Number : </span><input type="text" name="number" value="<?php echo $row['CHANGE_THIS_employee_number']; ?>" /><br>
<span>User Name : </span><input type="text" name="username" value="<?php echo $row['CHANGE_THIS_username']; ?>" /><br>
<span>Password : </span><input type="text" name="password" value="<?php echo $row['CHANGE_THIS_password']; ?>" /><br>
<span>Email : </span><input type="text" name="email" value="<?php echo $row['CHANGE_THIS_email']; ?>" /><br>
<span>User Role : </span>
<?php 
        include('../connect.php');
        $query="SELECT * FROM CHANGE_THIS_roles ORDER BY CHANGE_THIS_role_id ASC";
        $sql=$db->prepare($query);
        $sql->execute();
        $CHANGE_THIS_roles = $sql->fetchAll();
    ?>
<select name="CHANGE_THIS_role"> 
	<option selected ="<?php echo $row["CHANGE_THIS_role"]; ?>" value = "<?php echo $row["CHANGE_THIS_role"]; ?>"><?php echo $row["CHANGE_THIS_role"]; ?></option>           
    <?php foreach($CHANGE_THIS_roles as $CHANGE_THIS_role): ?>
        <option value="<?php echo $CHANGE_THIS_role["CHANGE_THIS_role_name"]; ?>"> <?php echo $CHANGE_THIS_role["CHANGE_THIS_role_name"]; ?></option>
    <?php endforeach; ?>
</select><br>
<span>Location : </span><input type="text" name="location" value="<?php echo $row['CHANGE_THIS_location']; ?>" /><br>
<span>Team : </span>
<?php 
        include('../connect.php');
        $query="SELECT * FROM teams ORDER BY team_id ASC";
        $sql=$db->prepare($query);
        $sql->execute();
        $teams = $sql->fetchAll();
    ?>
<select name="CHANGE_THIS_team"> 
	<option selected ="<?php echo $row["CHANGE_THIS_team"]; ?>" value = "<?php echo $row["CHANGE_THIS_team"]; ?>"><?php echo $row["CHANGE_THIS_team"]; ?></option>           
    <?php foreach($teams as $team): ?>
        <option value="<?php echo $team["team_name"]; ?>"> <?php echo $team["team_name"]; ?></option>
    <?php endforeach; ?>
</select><br>
<span>Note : </span><textarea  name="notes"><?php echo $row['CHANGE_THIS_notes'];?></textarea><br>
<div style="float:right; margin-right:35px">
    <button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save</button>
    </div>
</div>
</form>
<?php
}
?>