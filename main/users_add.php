<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="users_addsave.php" method="post">
<?php include("../connect.php"); ?>    
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i> Add User</div>
<hr>
<div id="ac" style="width:500px">
    <span>Full Name : </span><input type="text" name="full_name" placeholder="Full Name" Required/><br>
    <span>Employee Number : </span><input type="text" name="number" placeholder="Employee Number" Required/><br>
    <span>User Name : </span><input type="text" name="username" placeholder="User Name" Required/><br>
    <span>Password : </span><input type="text" name="password" placeholder="Password"/><br>
    <span>Email Address : </span><input type="text" name="email" placeholder="Email Address"/><br>
    <span>User Role :</span>
        <?php
            $query="SELECT * FROM user_roles";
            $sql=$db->prepare($query);
            $sql->execute();
            $user_roles = $sql->fetchAll();
        ?>
    <select name="user_role">            
        <?php foreach($user_roles as $user_role): ?>
            <option value="<?php echo $user_role["user_role_name"]; ?>"> <?php echo $user_role["user_role_name"]; ?></option>
        <?php endforeach; ?>
    </select>
    <span>Location : </span><input type="text" name="location" placeholder="Location"/><br>
    <span>Team :</span>
        <?php 
        $query= "SELECT * FROM teams";
        $sql=$db->prepare($query);
        $sql->execute();
        $teams = $sql->fetchAll();
        ?>
    <select name="team">            
        <?php foreach($teams as $team): ?>
            <option value="<?php echo $team["team_name"]; ?>"> <?php echo $team["team_name"]; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <span>Notes : </span><textarea style="height:60px;width:300px;" name="notes"></textarea><br>
    <div style="float:right; margin-right:35px">
    <button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save</button>
    </div>
</div>
</form>
