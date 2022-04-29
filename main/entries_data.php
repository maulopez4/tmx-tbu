<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
include("functions.php");
?>
<?php
    require_once('auth.php');
?>
<form> 
<?php include("../connect.php"); ?>    
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i> New Entry</div>
<hr>
<div id="ac" style="width:500px">
    <!--- Workstation --->    
    <span>Workstation : </span>
    <select name="workorder_workstation" id="workstation" required>  
    <?php
            $query="SELECT * FROM workstations";
            $sql=$db->prepare($query);
            $sql->execute();
            $wo_ws = $sql->fetchAll();
        ?>    
        <option value="" disabled selected>Select Workstation</option>    
            <?php foreach($wo_ws as $ws): ?>
                <option value="<?php echo $ws["workstation_code"]; ?>"> <?php echo $ws["workstation_code"]; ?> - <?php echo $ws["workstation_description"]; ?></option>
            <?php endforeach; ?>
    </select><br>
     <!--- Workorder Number --->
    <span>Workorder Number : </span><input type="text" name="workorder_number" id="number" placeholder="Enter Workorder Number" onchange="fetch_workorder(this.value);"/><br> 
     <!--- Inspected By --->
    <span>Inspected By : </span><input type="hidden" name="workorder_inspectedby" id="inspectedby" value="<?php echo $_SESSION['SESS_USER_NAME'];?>" /><input type="text" value="<?php echo $_SESSION['SESS_USER_NAME'];?>" disabled /><br>
    <!--- Brand --->
    <span>Brand : </span><input type='text' name='workorder_brand' id='brand' disabled/><br>
    <!--- Product Line --->
    <span>Product Line : </span><input type="text" name="workorder_product_line" id="product_line" disabled /><br> 
    <br>
    <!--- Mold --->
    <span>Mold : </span><input type="text" name="workorder_mold" id="mold" disabled/><br> 
    <br>
    <!--- Serial --->
    <span>Mold Serial : </span><input type="text" name="workorder_mold_serial" id="mold_serial" disabled/><br> 
    <br>
    <!--- Paint Code --->
    <span>Paint Code : </span><input type="text" name="workorder_paintcode" id="paintcode" disabled/><br> 
    <br>
    <span>Comments : </span><textarea style="height:60px;width:300px;" name="workorder_comments" id="comments01"></textarea><br>
<!--------------------------------------------------------------------------------------------------------------->
    
<!--------------------------------------------------------------------------------------------------------------->
    <div style="float:left; margin-right:25px">
    <span><button type="submit" formMethod="post" formAction="entries_approved_save.php" class="btn btn-success btn-block btn-large" style="float:left; width:230px; height:35px;"><i class="icon icon-save icon-large"></i> Approved</button></span>
    </div>
    <div style="float:right; margin-right:25px">
    <span><a rel="facebox" href="report_entry.php"><button type="submit" formMethod="post" formAction="report_entry.php" class="btn btn-warning btn-block btn-large" style="float:right; width:230px; height:35px;"><i class="icon icon-bell icon-large"></i> Report Unit</button></a></span>
    </div>
    
</div>
</form>